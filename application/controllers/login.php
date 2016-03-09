<?php

class Login_Controller extends Base_Controller {

	
	public function action_index()
	{
		$input = Input::all();
		if($input != null)
			{
			$credential=array('username'=>Input::get('username'),'password'=>Input::get('password'));

			if(Auth::attempt($credential))
				{
				Session::put('username',Input::get('username'));
				return Redirect::to('dashboard');
				}
			else
				{
				return Redirect::to('home')->with('conf',1);
				}
			}
			else
			{
			return Redirect::to('home')->with('conf',2);
			}
	}

}