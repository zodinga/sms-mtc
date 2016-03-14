<?php

class Login_form_Controller extends Base_Controller {

	
	public function action_index()
	{
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		return View::make('login.index')->with('conf',$conf);
	}

}