<?php

class Home_Controller extends Base_Controller {

	
	public function action_index()
	{

		$courses = Courses::all();
		$students = Students::all();
		return View::make('home.index')
			->with('courses',$courses)
			->with('students',$students);
	}

	public function action_studentExisting($id)
	{
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		$courses = Courses::all();
		$scp = StudentCoursePivots::where('course_id','=',$id)->first();
		$students = Students::where('course_id','=',$id)->order_by('yoa','DESC')->paginate('30');
		return View::make('home.list')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$id);
	}

	public function action_search()
	{
		
		$course_id = Input::get('course_id');
		$student = Students::where('course_id','=',$course_id);
		if(Input::has('name'))
		{
			$student->where('name','LIKE','%'.Input::get('name').'%');
		}
		if(Input::has('yoa'))
		{
			$student->where('yoa','=',Input::get('yoa'));
		}
		if(Input::has('contact_no'))
		{
			$student->where('contact_no','=',Input::get('contact_no'));
		}
		if(Input::has('town'))
		{
			$student->where('town','=',Input::get('town'));
		}
		if(Input::has('batch'))
		{
			$student->where('batch','=',Input::get('batch'));
		}
		$students = $student->get();
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		$courses = Courses::all();
		$scp = StudentCoursePivots::where('course_id','=',$course_id)->first();
		return View::make('home.searchList')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$course_id);


	}

}