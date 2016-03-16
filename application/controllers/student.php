<?php

class Student_Controller extends Base_Controller {

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
		return View::make('student.create')
			->with('courses',$courses)
			->with('conf',$conf);
	}

	public function action_studentCreate($id)
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
		$scps = StudentCoursePivots::all();
		return View::make('student.create')
			->with('courses',$courses)
			->with('scps',$scps)
			->with('conf',$conf);

	}
	public function action_studentSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$student = new students;
		
		$student->course_id = Input::get('course_id');
		$student->syllabus_start_date = Input::get('syllabus_start_date');
		$student->code = Input::get('code');
		$student->student = Input::get('student');
		$student->fullmark = Input::get('fullmark');
		$student->passmark = Input::get('passmark');
		$student->save();
		return Redirect::to('student')
			->with('conf',4);

	}
	public function action_studentEdit($id)
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
		$student = students::find($id);
		$students = students::all();
		$courses = Courses::all();
		$student_name = Courses::find($student->course_id);
		return View::make('student.edit')
			->with('conf',$conf)
			->with('student',$student)
			->with('student_name',$student_name)
			->with('courses',$courses)
			->with('students',$students);

	}
	public function action_studentUpdate()
	{
		$id = Input::get('id');
		$student = students::find($id);
		$student->course_id = Input::get('course_id');
		$student->syllabus_start_date = Input::get('syllabus_start_date');
		$student->code = Input::get('code');
		$student->student = Input::get('student');
		$student->fullmark = Input::get('fullmark');
		$student->passmark = Input::get('passmark');
		$student->save();
		return Redirect::to('student')
			->with('conf',5);
	}
	public function action_studentDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$student = students::find($id);
		if($student)
		{
			$student->delete();
			return Redirect::to('student')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('student')
				->with('conf',2);

		}
		
	}

}