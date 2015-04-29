<?php

class LoginController extends BaseController
{
	public function login()
	{
		$input    = Input::all();
		$remember = Input::has('remember') ? true : false ;
	

		if(Auth::attempt(array('email' => $input['username'], 'password' => $input['password']),$remember))
		{
			//Session::put('company',Auth::user()->company);

			//return Redirect::to( Auth::user()->company .'/inicio');
			//return Redirect::to( Auth::user()->company .'/inicio');
			//return Redirect::to(Session::get('company').'/inicio');

			//Session::put('master_id',Crypt::encrypt(Auth::User()->master_id));
			return Redirect::to('/inicio');
			
		}
		else
		{
			return Redirect::back()->withErrors('Usuario o Password Invalido');
		}
	}

	public function logOut()
	{
		Auth::logout();

		return Redirect::to('/login');
	}
}
?>