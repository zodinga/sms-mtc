<?php

class Result_Controller extends Base_Controller {

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
			$id = Session::get('course_id');
		}
		else
		{
			$id = 0;
		}
		$courses = Courses::all();
		$scp = StudentCoursePivots::where('course_id','=',$id)->first();
		$students = Students::where('course_id','=',$id)->order_by('yoa','DESC')->paginate('30');
		return View::make('result.student')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$id);
	}

	public function action_resultStudent($id)
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
		return View::make('result.student')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$id);

	}

	public function action_resultCreate($id)
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
		$result = Results::where('s_id','=',$id)->get();
		$student = Students::find($id);
		$student_id = $id;
		$subjects = Subjects::where('course_id','=',$student->course_id)->get();
		return View::make('result.create')
			->with('result',$result)
			->with('student',$student)
			->with('student_id',$student_id)
			->with('subjects',$subjects)
			->with('conf',$conf);

	}
	public function action_resultSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		
		$sid = Input::get('student_id');
		$student = Students::find($sid);
		$subjects = Subjects::where('course_id','=',$student->course_id)->get();
		$result = Results::where('s_id','=',$sid)->get();
		if($result)
		{
			foreach ($subjects as $subject) 
			{
				$subject_id = 'subj_id'.$subject->id;
				$mark = 'mark'.$subject->id;
				$marked = Results::where('s_id','=',$sid)->where('subj_id','=',$subject->id)->first();
				if($marked)
					{
						$marked->marks_scored = Input::get($mark);
						$marked->save();
					}
				else
					{
						$result = new Results;
						$result->s_id = $sid;
						$result->subj_id = Input::get($subject_id);
						$result->marks_scored = Input::get($mark);
						$result->save();
					
					}
				}
				return Redirect::to('result')
					->with('conf',4)
					->with('course_id',$student->course_id);
		}
		else
		{
			foreach ($subjects as $subject) {
				$subject_id = 'subj_id'.$subject->id;
				$mark = 'mark'.$subject->id;
				$result = new Results;
				$result->s_id = $sid;
				$result->subj_id = Input::get($subject_id);
				$result->marks_scored = Input::get($mark);
				$result->save();
				}
				return Redirect::to('result')
					->with('conf',4)
					->with('course_id',$student->course_id);;

		}
		//dd('stop');
		$result = new Results;
		
		$result->result = Input::get('resultname');
		$result->short_name = Input::get('shortname');
		$result->duration = Input::get('duration');
		$result->no_of_subjs = Input::get('noSubject');
		$result->remarks = Input::get('remarks');
		$result->save();
		return Redirect::to('result')
			->with('conf',4);

		
	}
	public function action_resultEdit($id)
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
		$result = results::find($id);
		$results = results::all();
		return View::make('result.edit')
			->with('conf',$conf)
			->with('result',$result)
			->with('results',$results);

	}
	public function action_resultUpdate()
	{
		$id = Input::get('id');
		$result = results::find($id);
		$result->result = Input::get('resultname');
		$result->short_name = Input::get('shortname');
		$result->duration = Input::get('duration');
		$result->no_of_subjs = Input::get('noSubject');
		$result->remarks = Input::get('remarks');
		$result->save();
		return Redirect::to('result')
			->with('conf',5);
	}
	public function action_resultDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$result = results::find($id);
		if($result)
		{
			$result->delete();
			return Redirect::to('result')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('result')
				->with('conf',2);

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
		if(Input::has('internal_registration'))
		{
			$student->where('internal_registration','=',Input::get('internal_registration'));
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
		return View::make('result.searchList')
			->with('conf',$conf)
			->with('scp',$scp)
			->with('students',$students)
			->with('courses',$courses)
			->with('course_id',$course_id);


	}

}