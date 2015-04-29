<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	
	//inicio
	public function getIndex( $model= null , $search = null )
	{
		$model 						= $this->data['model'];
		$this->data['seccion']		= 'Inicio';

		if(isset($search))
		{
			
			$mod  = $model::where('id','like','%'.$search.'%');
			
			foreach($this->search_by as $col)
			{
				$mod = $mod->orWhere($col,'like','%'.$search.'%');
			}
			
			$mod  = $mod->paginate('10');
		


			$this->data['model'] = $mod;
			
		}
		else
		{
			$this->data['model'] 	= $model::orderBy('id' ,'ASC')->paginate('10');
		}

			
		return View::make('view')->with($this->data);


	}



	//open form modal
	public function formModal($id = null)
	{
		$model 					= $this->data['model'];

		$this->data['seccion']	= 'Nuevo';

		if(!is_null($id))
		{
			$this->data['seccion']	= 'Editar';

			$this->data['model_edit'] 	= $model::find($id);
			
			return View::make('modal')->with($this->data);
		}

		return View::make('modal')->with($this->data);
	}

	// borra los datos
	public function getDel($id = null)
	{
		$model = $this->data['model'];

		$model =  $model::find($id);

		if($model->image != NULL)
		{
			$up 	 = new upload();
			$up->del($model->image);
		} 
		
					
		$model->delete();

		return Redirect::back();
	}


	//post nuevo
	public function postNew()
	{	
		$input = Input::all();

		if (Input::hasFile('image'))
		{	
			$up 	 = new upload();
			$up_file = $up->up($input['image'] , $this->img_path );

			if( $up_file != false)
			{
				$input['image']  = $up_file;
			}
		}

		$model = $this->data['model'];
	 	$model::create($input);

	 	return Redirect::back();
	}

	//post edit
	public function postEdit($id = null)
	{	
		$model = $this->data['model'];
	 	$model = $model::find($id);
	 	$input = Input::all();

		if (Input::hasFile('image'))
		{	
			$up 	 = new upload();

			if($model->image != NULL)
			{
				$up->del($model->image);
			}
				$up_file = $up->up($input['image'] , $this->img_path );
			
			if( $up_file != false)
			{
				$input['image']  = $up_file;
			}

		}
		else
		{
			$input['image'] = $model->image;
		}

	 	$model->fill($input);
	 	$model->save();
	 
	 	return Redirect::back();
	}
}
