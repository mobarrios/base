<?php

class UsersController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modules_id']	= 3;
		$this->data['modal'] 		= 'users';
		$this->data['ruta'] 		= 'users';
		$this->data['model'] 		= 'User';
		$this->data['modulo'] 		= 'Usuarios';
		$this->data['seccion']		= '';

		$this->search_by =  array('email','name','last_name');
	}

	//post nuevo
	public function postNew()
	{	
		$model = $this->data['model'];
		$input = Input::all();

		$pass  = Hash::make(Input::get('password'));
		$input['password'] = $pass;

	 	$model::create($input);

	 	return Redirect::back();
	}

	//post edit
	public function postEdit($id = null)
	{	
		$model = $this->data['model'];
	 	$model = $model::find($id);

	 	$input = Input::all();
		$pass  = Input::get('password');

		if (Hash::needsRehash($pass))
            {
                $pass = Hash::make($pass);
            }

		$input['password'] = $pass;

	 	$model->fill($input);
	 	$model->save();
	 
	 	return Redirect::back();
	}
}

?>