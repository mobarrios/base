<?php

class BaseModel extends Eloquent
{

//eventos en el model
	
	public static function boot()
      parent::boot();

        //when saving
		  static::saving(function($items)
       {
       		$items->master_id = Crypt::decrypt(Session::get('master_id'));
       });

          
       
    }

}
?>