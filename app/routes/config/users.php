<?php
	//users

	Route::group(array('before'=>'validation:3-read'),function()
	{	
		Route::get('usuarios/{model?}/{search?}', 	array('as' => 'users', 				'uses'  => 'UsersController@getIndex'));
	});

	Route::group(array('before'=>'validation:3-edit'),function()
	{
		Route::get('usuarios_editar/{id?}', 		array('as' => 'users_edit_form',	'uses'	=> 'UsersController@formModal'));
		Route::post('usuarios_editar/{id?}', 		array('as' => 'users_post_edit', 	'uses' 	=> 'UsersController@postEdit'));
	});

	Route::group(array('before'=>'validation:3-delete'),function()
	{
		Route::get('usuarios_borrar/{id?}', 		array('as' => 'users_delete',		'uses'	=> 'UsersController@getDel'));
	});

	Route::group(array('before'=>'validation:3-add'),function()
	{
		Route::get('usuarios_nuevo', 				array('as' => 'users_new_form', 	'uses'  => 'UsersController@formModal'));
		Route::post('usuarios_nuevo', 				array('as' => 'users_post_new', 	'uses' 	=> 'UsersController@postNew'));
	});
	
?>