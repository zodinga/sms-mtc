<?php

class Subject_Controller extends Base_Controller {

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
		return View::make('subject.create')
			->with('courses',$courses)
			->with('conf',$conf);
	}

	public function action_subjectCreate()
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
		
		return View::make('subject.create')
			->with('courses',$courses)
			->with('conf',$conf);

	}
	public function action_subjectSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$subject = new Subjects;
		
		$subject->course_id = Input::get('course_id');
		$subject->syllabus_start_date = Input::get('syllabus_start_date');
		$subject->code = Input::get('code');
		$subject->subject = Input::get('subject');
		$subject->fullmark = Input::get('fullmark');
		$subject->passmark = Input::get('passmark');
		$subject->save();
		return Redirect::to('subject')
			->with('conf',4);

	}
	public function action_subjectEdit($id)
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
		$subject = Subjects::find($id);
		$subjects = Subjects::all();
		$courses = Courses::all();
		$subject_name = Courses::find($subject->course_id);
		return View::make('subject.edit')
			->with('conf',$conf)
			->with('subject',$subject)
			->with('subject_name',$subject_name)
			->with('courses',$courses)
			->with('subjects',$subjects);

	}
	public function action_subjectUpdate()
	{
		$id = Input::get('id');
		$subject = Subjects::find($id);
		$subject->course_id = Input::get('course_id');
		$subject->syllabus_start_date = Input::get('syllabus_start_date');
		$subject->code = Input::get('code');
		$subject->subject = Input::get('subject');
		$subject->fullmark = Input::get('fullmark');
		$subject->passmark = Input::get('passmark');
		$subject->save();
		return Redirect::to('subject')
			->with('conf',5);
	}
	public function action_subjectDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$subject = Subjects::find($id);
		if($subject)
		{
			$subject->delete();
			return Redirect::to('subject')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('subject')
				->with('conf',2);

		}
		
	}

}