<?php

class Profiles extends Eloquent
{
	protected $table = 'profiles';
	protected $guarded = array('');

	public function User()
	{
		return $this->hasMany('User');
	}
}

?>