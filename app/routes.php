<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|I
*/

Route::get('image', function()
{
    $img = Image::make('assets/images/logo_aclv.png');

    return $img->response('jpg');
});


Route::get('barcode',function(){

echo DNS1D::getBarcodeHTML("444511111111", "EAN13");
echo DNS2D::getBarcodeHTML("alejandro", "QRCODE");

return ;
});

/// WEB SERVICE API REST FULL
Route::group(array('prefix' => 'api/v1'), function()
{

	Route::get('app/{search}',function($search){

 		 header('Access-Control-Allow-Origin: *');	

 		 if($search == 'all')
 		 {
 		 	$item = Items::all();
 		 }
 		 else
 		 {
 			$item = Items::where('code','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->first();	 	
 		 }
		
	
		

		return Response::json($item);

	});
});

Route::get('empresa/{company}',function($company)
{

	switch ($company) 
	{
		case 'sancus':
				Session::put('db','admin_sancus');
				Session::put('company','sancus');

				return Redirect::to('login');
				break;

		case 'laregaleria':
				Session::put('db','admin_laregaleria');
				Session::put('company','laregaleria');

				return Redirect::to('login');
				break;

		case 'aclv':
				Session::put('db','admin_aclv');
				Session::put('company','aclv');

				return Redirect::to('login');
				break;
		
		default:
				Session::put('db','admin_base');
				Session::put('company','base');
				
				return Redirect::to('login');
				break;
	}
});

Route::get('login',function()
{
	return View::make('login');
});

			
// todo lo que esta aca adentro previo cambio de DB

Route::group(array('before'=>'switchDB'),function()
{

			Route::get('table',function(){
			return View::make('table');
			});


		//postea el login 
		Route::post('login',array('as'=>'post_login', 'uses'=>'LoginController@login'));

		
		Route::group(array('before' => 'auth'), function()
		{

				Route::get('salir',  array('as'=>'logout', 'uses'=>'LoginController@logOut'));

				Route::get('inicio', function()
				{
					$data['master'] = Company::all()->first();

					return View::make('index')->with($data);
				});

				
				//config 
				require(__DIR__ . '/routes/config/users.php');
				require(__DIR__ . '/routes/config/profiles.php');
				require(__DIR__ . '/routes/config/permissions.php');


				//require(__DIR__ . '/routes/config/ajax.php');
		});

		// ajax search	

		Route::post('buscar', function()
		{				
			$input 	= Input::all();
			$model  = $input['model'];
			$search = $input['buscar'];

			return Redirect::route($input['model'],array($model,$search));
		});

		



		

	
		// update database

	Route::get('create',function()
		{
			DBupdate::create();
				
			//DBupdate::update();
			return "created OK";
		});

		Route::get('update',function()
		{
			DBupdate::update();
				
			//DBupdate::update();
			return "updated OK";
		});

	});



