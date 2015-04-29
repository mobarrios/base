<?php

class Permissions extends Eloquent
{
	protected $table = 'permissions';

	public function Modules()
	{
		return $this->belongsTo('Modules');
	}

}