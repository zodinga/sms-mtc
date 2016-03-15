<?php

class Dashboard_Controller extends Base_Controller {

	
	public function action_index()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$courses  = Courses::all();
		return View::make('dashboard.index')
			->with('courses',$courses);
	}

	
}