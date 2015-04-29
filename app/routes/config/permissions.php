<?php
//Permissions

Route::get('permisos/{id?}', 	array('as' => 'permissions', 'uses'  => 'PermissionsController@getEdit'));

Route::get('permisos_update/{id?}/{type?}/{bool?}',  array('as' => 'permissions_update','uses' =>'PermissionsController@getUpdate'));
	

?>