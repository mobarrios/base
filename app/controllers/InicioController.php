<?php

class InicioController extends BaseController
{

	protected $data = array();

	public function __construct()
	{
		$this->data['model_view'] 	= 'items';
		$this->data['model'] 		= 'Items';
		$this->data['modulo'] 		= 'Articulos';
		$this->data['seccion']		= '';
	}


}

?>