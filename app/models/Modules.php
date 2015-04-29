<?php
 
class Modules extends Eloquent
{
	protected $table = 'modules';

	public function Menus()
	{
		return $this->hasMany('Menus');
	}

	public function SubMenus()
	{
		return $this->hasMany('SubMenus');
	}

	public function Permissions()
	{
		return $this->hasMany('Permissions');
	}

	public function PermissionsProfiles($id_profiles = null)
	{
		return $this->hasMany('Permissions')->where('profiles_id','=',$id_profiles)->get();
	}
	
	
}

?>