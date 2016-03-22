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

		if(Session::has('course_id'))
		{
			$course_id = Session::get('course_id');
		}
		else
		{
			$course_id = 0;
		}
		$courses = Courses::all();
		$scp = StudentCoursePivots::where('course_id','=',$course_id)->first();
		$students = Students::where('course_id','=',$course_id)->order_by('yoa','DESC')->paginate('30');
		return View::make('student.list')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$course_id);
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
		$students = Students::where('id','>',0)->order_by('yoa','asc')->get();
		$scp = StudentCoursePivots::where('course_id','=',$id)->first();
		return View::make('student.create')
			->with('courses',$courses)
			->with('course_id',$id)
			->with('students',$students)
			->with('scp',$scp)
			->with('conf',$conf);

	}
	public function action_studentSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$student = new students;
		$course_id = Input::get("course_id");
		$student->course_id = Input::get("course_id");
		$student->name = Input::get("name");
		$student->fname = Input::get("fname");
		$student->dob = Input::get("dob");
		$student->pob = Input::get("pob");
		$student->gender = Input::get("gender");
		$student->nationality = Input::get("nationality");
		$student->contact_no = Input::get("contact_no");
		$student->local_church_address = Input::get("local_church_address");
		$student->street = Input::get("street");
		$student->town = Input::get("town");
		$student->district = Input::get("district");
		$student->state = Input::get("state");
		$student->pin = Input::get("pin");
		$student->pstreet = Input::get("pstreet");
		$student->ptown = Input::get("ptown");
		$student->pdistrict = Input::get("pdistrict");
		$student->pstate = Input::get("pstate");
		$student->ppin = Input::get("ppin");
		$student->guardian_name = Input::get("guardian_name");
		$student->guardian_address = Input::get("guardian_address");
		$student->yoa = Input::get("yoa");
		$student->batch = Input::get("batch");
		$student->ten_board = Input::get("ten_board");
		$student->ten_year = Input::get("ten_year");
		$student->ten_degree = Input::get("ten_degree");
		$student->ten_division = Input::get("ten_division");
		$student->twelve_board = Input::get("twelve_board");
		$student->twelve_year = Input::get("twelve_year");
		$student->twelve_degree = Input::get("twelve_degree");
		$student->twelve_division = Input::get("twelve_division");
		$student->degree_board = Input::get("degree_board");
		$student->degree_year = Input::get("degree_year");
		$student->degree_degree = Input::get("degree_degree");
		$student->degree_division = Input::get("degree_division");
		$student->job_id = Input::get("job_id");
		$student->jobs_place = Input::get("jobs_place");
		$student->jobs_field = Input::get("jobs_field");
		$student->yoj = Input::get("yoj");
		$student->remarks = Input::get("remarks");
		$student->save();
		return Redirect::to('student')
			->with('conf',4)
			->with('course_id',$course_id);

	}
	public function action_studentExisting($id)
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
		$scp = StudentCoursePivots::where('course_id','=',$id)->first();
		$students = Students::where('course_id','=',$id)->order_by('yoa','DESC')->paginate('30');
		return View::make('student.list')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$id);
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
		$student = Students::find($id);
		$courses = Courses::all();
		$scp = StudentCoursePivots::where('course_id','=',$student->course_id)->first();
		//var_dump($scp);
		return View::make('student.edit')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('student',$student)
			->with('courses',$courses);
	}
	public function action_studentUpdate()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$sid = Input::get('id');
		$student = Students::find($sid);
		$student->course_id = $student->course_id;
		$student->name = Input::get("name");
		$student->fname = Input::get("fname");
		$student->dob = Input::get("dob");
		$student->pob = Input::get("pob");
		$student->gender = Input::get("gender");
		$student->nationality = Input::get("nationality");
		$student->contact_no = Input::get("contact_no");
		$student->local_church_address = Input::get("local_church_address");
		$student->street = Input::get("street");
		$student->town = Input::get("town");
		$student->district = Input::get("district");
		$student->state = Input::get("state");
		$student->pin = Input::get("pin");
		$student->pstreet = Input::get("pstreet");
		$student->ptown = Input::get("ptown");
		$student->pdistrict = Input::get("pdistrict");
		$student->pstate = Input::get("pstate");
		$student->ppin = Input::get("ppin");
		$student->guardian_name = Input::get("guardian_name");
		$student->guardian_address = Input::get("guardian_address");
		$student->yoa = Input::get("yoa");
		$student->batch = Input::get("batch");
		$student->ten_board = Input::get("ten_board");
		$student->ten_year = Input::get("ten_year");
		$student->ten_degree = Input::get("ten_degree");
		$student->ten_division = Input::get("ten_division");
		$student->twelve_board = Input::get("twelve_board");
		$student->twelve_year = Input::get("twelve_year");
		$student->twelve_degree = Input::get("twelve_degree");
		$student->twelve_division = Input::get("twelve_division");
		$student->degree_board = Input::get("degree_board");
		$student->degree_year = Input::get("degree_year");
		$student->degree_degree = Input::get("degree_degree");
		$student->degree_division = Input::get("degree_division");
		$student->job_id = Input::get("job_id");
		$student->jobs_place = Input::get("jobs_place");
		$student->jobs_field = Input::get("jobs_field");
		$student->yoj = Input::get("yoj");
		$student->remarks = Input::get("remarks");
		$student->save();
		return Redirect::to('student')
			->with('conf',5)
			->with('course_id',$student->course_id);
	}
	public function action_studentDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$student = students::find($id);
		$course_id = $student->course_id;
		if($student)
		{
			$student->delete();
			return Redirect::to('student')
				->with('conf',1)
				->with('course_id',$course_id);
		}
		else
		{
			return Redirect::to('student')
				->with('conf',2)
				->with('course_id',$course_id);

		}
		
	}

	public function action_search()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
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
		return View::make('student.searchList')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$course_id);


	}

}