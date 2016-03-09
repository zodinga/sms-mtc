<?php

class Dashboard_Controller extends Base_Controller {

	
	public function action_index()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		return View::make('dashboard.index');
	}

}