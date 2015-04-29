<?php
    
     Form::macro('brands', function($name, $label)
        {
            $brand   = Brands::lists('name','id');
            $input   = Form::select($name , array('Ninguno') + $brand ,null, array('class'=>'form-control')); 

            return buildInput($input,$label);  
        });

    Form::macro('profiles', function($name, $label)
        {
            //$areas  = Area::lists('area','id');
            $value  = Form::getValueAttribute($name);

            $profiles     = Profiles::lists('profile','id');

            $input  = Form::select($name , $profiles , $value , array('class'=>'form-control')); 

            return buildInput($input,$label);
        });


    Form::macro('caja_type',function($name,$label)
    {
             $method = array('0' => 'Ninguno', '1'=>'Gastos Varios','2'=>'Ingresos Varios','3'=>'Retiro de Caja','4'=>'Gastos Fijos');

             $input = Form::select($name, $method, null , array('class'=>'form-control')); 

             return buildInput($input, $label);

    });


    Form::macro('pay_method',function($name,$label)
    {
             $method = array('0' => 'Ninguno', '1'=>'Efectivo','2'=>'Tarjeta de Credito','3'=>'Desposito','4'=>'Transferencia','5'=>'Cheque');

             $input = Form::select($name, $method, null , array('class'=>'form-control')); 

             return buildInput($input, $label);

    });
   
    Form::macro('providers', function($name, $label)
        {
            $prov   = Providers::lists('name','id');
            $input  = Form::select($name , array('Ninguno') + $prov ,null, array('class'=>'form-control')); 

            return buildInput($input,$label);  
        });

 	Form::macro('date', function($name)
        {
            $value = Form::getValueAttribute($name);

            return '<input type="text" class="datepicker form-control " name="'.$name.'" placeholder="dd-mm-aaaa" value="'.$value.'">';
        });

    Form::macro('areas', function($name)
        {
            $areas = Area::lists('area','id');
            return Form::select($name,$areas,array('class'=>'form-control')); 
        });

     Form::macro('um', function($name, $label)
        {
            //$areas  = Area::lists('area','id');
            $value  = Form::getValueAttribute($name);

            $um     = array('0'=>'Ninguno', '1'=>'Unidad','2'=>'Caja x 50','3'=>'Cm3','4'=>'Mt2');

            $input  = Form::select($name , $um , $value , array('class'=>'form-control')); 

            return buildInput($input,$label);
        });

     Form::macro('imagen',function($name)
     {
        $value = Form::getValueAttribute($name);
        $img   = null; 

        if(!is_null($value))
        {
            $img  = '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <a href="'.$value.'" class="thumbnail">
                            <img src="'.$value.'" alt="">
                        </a>
                    </div>';
        }
        
        $input = '  <div class="row">
                    <div class="col-xs-12">
                       '.$img.'
                    </div>
                    <div class="col-xs-12">
                        <div class="form-control">
                        <input  type="file" name="'.$name.'" >
                    </div>
                    </div>
                    </div>';
                    


        return buildInput($input);
     });
    

    Form::macro('edit', function($name)
        {
            $value = Form::getValueAttribute($name);
            return '<div class="form-control">
                        <textarea  name="'.$name.'" >'.$value.'</textarea>
                    </div>';
        });

    Form::macro('texto', function($name, $label)
        {    
            $value = Form::getValueAttribute($name);
            $input = '<input class="form-control" name="'.$name.'" value="'.$value.'">';
    
            return buildInput($input,$label);         
          	
        });

    Form::macro('pass', function($name, $label)
        {    
            $value = Form::getValueAttribute($name);
            $input = '<input type="password" class="form-control" name="'.$name.'" value="'.$value.'">';
    
            return buildInput($input,$label);         
            
        });

    Form::macro('number', function($name, $label, $step, $minimum)
        {    
            $value = Form::getValueAttribute($name);
            $input = '<input type="number" class="form-control" name="'.$name.'" value="'.$value.'" step="'.$step.'" min="'.$minimum.'">';
    
            return buildInput($input,$label);         
            
        });

    Form::macro('categories', function($name)
    {
        
        // Retrieves the id from the model when it comes from the edit side
        $id = Form::getValueAttribute('id');
                
        $var        = '  <div style="max-height: 200px;  overflow-y: scroll;" >
            
                    <ul class="list-group">';
        
        foreach(Categories::orderBy('name','ASC')->get() as $category)
        {

            if($itemscategories = ItemsCategories::where('items_id','=',$id)->where('categories_id','=',$category->id)->first())
            {
               $checked = "checked";
            }else{
               $checked = "";
            }
            
            $var .= '<li class="list-group-item">
                        <input type="checkbox" name="chk_category[]"  
                            value="'.$category->id.'" 
                            '.$checked.'
                        >  '.$category->name.'</li>'; 
        } 
                                        
            
        $var .= '</ul></div>';

        return $var;        
    });

    


//armamos el div con el label y el input

function buildInput($input = null , $label = null)
{
	$input = '		<div class="row">
					<div class="col-xs-12">
						<label class="control-label">'.$label.'</label>
					</div>
					<div class="col-xs-12">
						'.$input.'
					</div>
					</div>';

	return $input;
}
?>