<?php

class ExampleController extends BaseController
{
	protected $data = array();

	public function __construct()
	{
		$this->data['modules_id']	= 1;
		$this->data['modal'] 		= 'example';
		$this->data['ruta'] 		= 'example';
		$this->data['model'] 		= 'example';
		$this->data['modulo'] 		= 'example';
		$this->data['seccion']		= '';
	}

	
}

?>