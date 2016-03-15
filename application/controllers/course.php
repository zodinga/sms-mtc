<?php

class Course_Controller extends Base_Controller {

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
		$courses = Courses::all();
		return View::make('course.create')
			->with('courses',$courses)
			->with('conf',$conf);
	}

	public function action_courseCreate()
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
		$courses = Courses::all();

		
		return View::make('course.create')
			->with('courses',$courses)
			->with('conf',$conf);

	}
	public function action_courseSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$course = new Courses;
		
		$course->course = Input::get('coursename');
		$course->duration = Input::get('duration');
		$course->no_of_subjs = Input::get('noSubject');
		$course->remarks = Input::get('remarks');
		$course->save();
		return Redirect::to('course')
			->with('conf',4);

		
	}
	public function action_courseEdit($id)
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
		$course = Courses::find($id);
		$courses = Courses::all();
		return View::make('course.edit')
			->with('conf',$conf)
			->with('course',$course)
			->with('courses',$courses);

	}
	public function action_courseUpdate()
	{
		$id = Input::get('id');
		$course = Courses::find($id);
		$course->course = Input::get('coursename');
		$course->duration = Input::get('duration');
		$course->no_of_subjs = Input::get('noSubject');
		$course->remarks = Input::get('remarks');
		$course->save();
		return Redirect::to('course')
			->with('conf',5);
	}
	public function action_courseDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$course = Courses::find($id);
		if($course)
		{
			$course->delete();
			return Redirect::to('course')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('course')
				->with('conf',2);

		}
		
	}

}