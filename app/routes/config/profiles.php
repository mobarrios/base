<?php
	//profiles
	
	Route::group(array('before'=>'validation:4-read'),function()
	{	
		Route::get('perfiles/{model?}/{search?}', 	array('as' => 'profiles', 				'uses'  => 'ProfilesController@getIndex'));
	});

	Route::group(array('before'=>'validation:4-edit'),function()
	{
		Route::get('perfiles_editar/{id?}', 		array('as' => 'profiles_edit_form',		'uses'	=> 'ProfilesController@formModal'));
		Route::post('perfiles_editar/{id?}', 		array('as' => 'profiles_post_edit', 	'uses' 	=> 'ProfilesController@postEdit'));
	});

	Route::group(array('before'=>'validation:4-delete'),function()
	{
		Route::get('perfiles_borrar/{id?}', 		array('as' => 'profiles_delete',		'uses'	=> 'ProfilesController@getDel'));
	});

	Route::group(array('before'=>'validation:4-add'),function()
	{
		Route::get('perfiles_nuevo', 				array('as' => 'profiles_new_form', 		'uses'  => 'ProfilesController@formModal'));
		Route::post('perfiles_nuevo', 				array('as' => 'profiles_post_new', 		'uses' 	=> 'ProfilesController@postNew'));
	});

	
	
?>