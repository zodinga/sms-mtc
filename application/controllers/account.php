<?php

class Account_Controller extends Base_Controller {

	public function action_index()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		$users = Users::all();
		$courses = Courses::all();
		return View::make('account.create')
			->with('users',$users)
			->with('courses',$courses)
			->with('conf',$conf);
	}

	public function action_accountCreate()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		$users = Users::all();

		$courses = Courses::all();
		return View::make('account.create')
			->with('users',$users)
			->with('courses',$courses)
			->with('conf',$conf);

	}
	public function action_accountSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$user = new Users;
		$courses = Courses::all();
		if(Input::get('password') == Input::get('repassword'))
		{
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::to('account')
				->with('courses',$courses)
				->with('conf',4);

		}
		else
		{
			return Redirect::to('account')
				->with('courses',$courses)
				->with('conf',3);
		}
	}
	public function action_accountEdit($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		$user = Users::find($id);
		$users = Users::all();
		$courses = Courses::all();
		return View::make('account.edit')
			->with('conf',$conf)
			->with('user',$user)
			->with('courses',$courses)
			->with('users',$users);

	}
	public function action_accountUpdate()
	{
		$id = Input::get('id');
		$user = Users::find($id);
		$user->username = Input::get('username');
		if (Hash::check(Input::get('old_password'), $user->password))
		{
    		if(Input::get('password')==Input::get('repassword'))
    		{
    			$user->password=Hash::make(Input::get('password'));
    		}
    		$user->save();
			return Redirect::to('account')
			->with('conf',5);
		}
		else
		{
			return Redirect::to('account')
			->with('conf',6);
		}
			

		
	}
	public function action_accountDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$user = Users::find($id);
		if($user)
		{
			$user->delete();
			return Redirect::to('account')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('account')
				->with('conf',2);

		}
		
	}

	

}