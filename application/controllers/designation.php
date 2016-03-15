<?php

class Designation_Controller extends Base_Controller {

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
		$designations = Designations::all();
		return View::make('designation.create')
			->with('designations',$designations)
			->with('conf',$conf);
	}

	public function action_designationCreate()
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
		$designations = designations::all();

		
		return View::make('designation.create')
			->with('designations',$designations)
			->with('conf',$conf);

	}
	public function action_designationSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$designation = new Designations;
		
		$designation->designation = Input::get('designation');
		$designation->save();
		return Redirect::to('designation')
			->with('conf',4);

		
	}
	public function action_designationEdit($id)
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
		$designation = Designations::find($id);
		$designations = Designations::all();
		return View::make('designation.edit')
			->with('conf',$conf)
			->with('designation',$designation)
			->with('designations',$designations);

	}
	public function action_designationUpdate()
	{
		$id = Input::get('id');
		$designation = designations::find($id);
		$designation->designation = Input::get('designation');
		$designation->save();
		return Redirect::to('designation')
			->with('conf',5);
	}
	public function action_designationDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$designation = Designations::find($id);
		if($designation)
		{
			$designation->delete();
			return Redirect::to('designation')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('designation')
				->with('conf',2);

		}
		
	}

}