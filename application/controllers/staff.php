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
		$designations = Designations::all();
		return View::make('staff.create')
			->with('staff',$staff)
			->with('designations',$designations)
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
		$designations = Designations::all();
		$courses = Courses::all();
		return View::make('staff.create')
			->with('staff',$staff)
			->with('conf',$conf)
			->with('designations',$designations)
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

		$filename=$this->upload($staff->id);
		$staff->photo=$filename;
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
		$designations = Designations::all();
		$desig= Designations::find($staff->desig);
		$staffs = Staffs::all();
		return View::make('staff.edit')
			->with('conf',$conf)
			->with('designations',$designations)
			->with('desig',$desig)
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
		
		$input = Input::all();
		if($input['photo1']['name'])
		{
			$filename=$this->upload($staff->id);
			$staff->photo=$filename;
			$staff->save();
		}
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

	public function upload($photo_id)
    {
       $input = Input::all();
         
        $rules = array(
            'photo1' => 'required|image|max:10000', //photo upload must be an image and must not exceed 500kb
        );
 
        $validation = Validator::make($input, $rules);
 
        if( $validation->fails() ) {
        	echo "Failed";
            return Redirect::to('dashboard')->with_errors($validation);
        }

        $extension = File::extension($input['photo1']['name']);
          
        $directory = path('public').'/image/staff/';

        $filename = "staff_".time()."_".$photo_id.".{$extension}";

        $upload_success = Input::upload('photo1', $directory, $filename);
        if( $upload_success ) {
            
            return $filename;
        } else {
            Session::flash('status_error', 'An error occurred while uploading your new Photo - please try again.');
        }
        
    }

}