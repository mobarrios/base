<?php

class Menus extends Eloquent
{
	
	protected $table = 'menus';

	public function Modules()
	{
		return $this->belongsTo('Modules');
	}


}
