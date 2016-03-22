<?php

class Staff_Controller extends Base_Controller {

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
		$staff = Staffs::all();
		return View::make('staff.create')
			->with('staff',$staff)
			->with('conf',$conf);
	}

	public function action_staffCreate()
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
		$staff = Staffs::all();

		$courses=Courses::all();
		return View::make('staff.create')
			->with('staff',$staff)
			->with('conf',$conf)
			->with('courses',$courses);

	}
	public function action_staffSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$staff = new Staffs;
		
		$staff->name = Input::get('name');
		$staff->fname = Input::get('fname');
		$staff->contact_no = Input::get('contact_no');
		$staff->desig = Input::get('desig');
		$staff->date_of_joining = Input::get('date_of_joining');
		$staff->dob = Input::get('dob');
		$staff->gender = Input::get('gender');
		$staff->address = Input::get('address');
		$staff->qualification = Input::get('qualification');
		$staff->remarks = Input::get('remarks');
		$staff->save();
		return Redirect::to('staff')
			->with('conf',4);

		
	}
	public function action_staffEdit($id)
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
		$staff = Staffs::find($id);
		$staffs = Staffs::all();
		return View::make('staff.edit')
			->with('conf',$conf)
			->with('staffs',$staffs)
			->with('staff',$staff);

	}
	public function action_staffUpdate()
	{
		$id = Input::get('id');
		$staff = Staffs::find($id);
		$staff->name = Input::get('name');
		$staff->fname = Input::get('fname');
		$staff->contact_no = Input::get('contact_no');
		$staff->desig = Input::get('desig');
		$staff->date_of_joining = Input::get('date_of_joining');
		$staff->dob = Input::get('dob');
		$staff->gender = Input::get('gender');
		$staff->address = Input::get('address');
		$staff->qualification = Input::get('qualification');
		$staff->remarks = Input::get('remarks');
		$staff->save();
		return Redirect::to('staff')
			->with('conf',5);
	}
	public function action_staffDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$staff = Staffs::find($id);
		if($staff)
		{
			$staff->delete();
			return Redirect::to('staff')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('staff')
				->with('conf',2);

		}
		
	}

	public function action_staffExisting()
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
		$staffs = Staffs::all();
		return View::make('staff.list')
			->with('conf',$conf)
			->with('staffs',$staffs)
			->with('courses',$courses);
	}

}