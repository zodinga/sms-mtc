<?php

class Student_course_pivot_Controller extends Base_Controller {

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
		$scps = StudentCoursePivots::all();
		return View::make('studentCoursePivot.index')
			->with('courses',$courses)
			->with('scps',$scps)
			->with('conf',$conf);
	}

	public function action_fieldSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$courses = Courses::all();
		foreach ($courses as $course) 
		{
			$photo = "photo".$course->id;
			$name = "name".$course->id;
			$fname ="fname".$course->id;
			$internal_registration ="internal_registration".$course->id;
			$university_registration ="university_registration".$course->id;
			$dob = "dob".$course->id;
			$pob = "pob".$course->id;
			$gender = "gender".$course->id;
			$nationality = "nationality".$course->id;
			$contact_no = "contact_no".$course->id;
			$local_church_address = "local_church_address".$course->id;
			$street = "street".$course->id;
			$town = "town".$course->id;
			$district = "district".$course->id;
			$state = "state".$course->id;
			$pin = "pin".$course->id;
			$pstreet = "pstreet".$course->id;
			$ptown = "ptown".$course->id;
			$pdistrict = "pdistrict".$course->id;
			$pstate = "pstate".$course->id;
			$ppin = "ppin".$course->id;
			$guardian_name = "guardian_name".$course->id;
			$guardian_address = "guardian_address".$course->id;
			$yoa = "yoa".$course->id;
			$batch = "batch".$course->id;
			$ten_board = "ten_board".$course->id;
			$ten_year = "ten_year".$course->id;
			$ten_degree = "ten_degree".$course->id;
			$ten_division = "ten_division".$course->id;
			$twelve_board = "twelve_board".$course->id;
			$twelve_year = "twelve_year".$course->id;
			$twelve_degree = "twelve_degree".$course->id;
			$twelve_division = "twelve_division".$course->id;
			$degree_board = "degree_board".$course->id;
			$degree_year = "degree_year".$course->id;
			$degree_degree = "degree_degree".$course->id;
			$degree_division = "degree_division".$course->id;
			$job_id = "job_id".$course->id;
			$jobs_place = "jobs_place".$course->id;
			$jobs_field = "jobs_field".$course->id;
			$yoj = "yoj".$course->id;
			$status = "status".$course->id;
			$remarks = "remarks".$course->id;

			$scp = StudentCoursePivots::where('course_id','=',$course->id)->first();
			$scp->photo = Input::get($photo);
			$scp->name = Input::get($name);
			$scp->fname = Input::get($fname);
			$scp->internal_registration = Input::get($internal_registration);
			$scp->university_registration = Input::get($university_registration);
			$scp->dob = Input::get($dob);
			$scp->pob = Input::get($pob);
			$scp->gender = Input::get($gender);
			$scp->nationality = Input::get($nationality);
			$scp->contact_no = Input::get($contact_no);
			$scp->local_church_address = Input::get($local_church_address);
			$scp->street = Input::get($street);
			$scp->town = Input::get($town);
			$scp->district = Input::get($district);
			$scp->state = Input::get($state);
			$scp->pin = Input::get($pin);
			$scp->pstreet = Input::get($pstreet);
			$scp->ptown = Input::get($ptown);
			$scp->pdistrict = Input::get($pdistrict);
			$scp->pstate = Input::get($pstate);
			$scp->ppin = Input::get($ppin);
			$scp->guardian_name = Input::get($guardian_name);
			$scp->guardian_address = Input::get($guardian_address);
			$scp->yoa = Input::get($yoa);
			$scp->batch = Input::get($batch);
			$scp->ten_board = Input::get($ten_board);
			$scp->ten_year = Input::get($ten_year);
			$scp->ten_degree = Input::get($ten_degree);
			$scp->ten_division = Input::get($ten_division);
			$scp->twelve_board = Input::get($twelve_board);
			$scp->twelve_year = Input::get($twelve_year);
			$scp->twelve_degree = Input::get($twelve_degree);
			$scp->twelve_division = Input::get($twelve_division);
			$scp->degree_board = Input::get($degree_board);
			$scp->degree_year = Input::get($degree_year);
			$scp->degree_degree = Input::get($degree_degree);
			$scp->degree_division = Input::get($degree_division);
			$scp->job_id = Input::get($job_id);
			$scp->jobs_place = Input::get($jobs_place);
			$scp->jobs_field = Input::get($jobs_field);
			$scp->yoj = Input::get($yoj);
			$scp->status = Input::get($status);
			$scp->remarks = Input::get($remarks);
			$scp->save();
		}
		return Redirect::to('student_course_pivot')
			->with('conf',1);

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
		
		return View::make('student.create')
			->with('courses',$courses)
			->with('conf',$conf);

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