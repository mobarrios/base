<?php

class PermissionsController extends BaseController
{
	public function getEdit($profiles_id = null)
	{
		$data['modules'] 		= Modules::where('available','=',1)->orderBy('name','ASC')->get();
		$data['profiles_id'] 	= $profiles_id;

		return View::make('permissions.form')->with($data);
	}

	public function getUpdate($permissions_id = null , $permissions_value = null , $bool)
	{

			$permissions 					 = Permissions::find($permissions_id);
			$permissions->$permissions_value = $bool ;
			$permissions->save();

		return Response::json(true);
	}
}

?>