<?php

class ProfilesController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modules_id']	= 4;
		$this->data['modal'] 		= 'profiles';
		$this->data['ruta'] 		= 'profiles';
		$this->data['model'] 		= 'Profiles';
		$this->data['modulo'] 		= 'Perfiles';
		$this->data['seccion']		= '';
	}

	public function postNew()
	{	
		$model = $this->data['model'];
	 	$profile = $model::create(Input::all());

	 	$modules = Modules::all();
	 	
	 	foreach($modules as $module)
	 	{
	 		$permissions = new Permissions();
	 		$permissions->read 			= 0;
	 		$permissions->edit 			= 0;
	 		$permissions->delete 		= 0;
	 		$permissions->add 			= 0;
	 		$permissions->modules_id 	= $module->id;
	 		$permissions->profiles_id 	= $profile->id;
	 		$permissions->save();	 			
	 	}

	 	return Redirect::back();
	}
}

?>