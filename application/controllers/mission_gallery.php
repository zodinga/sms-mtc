<?php

class Mission_Gallery_Controller extends Base_Controller {

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
		
		$galleries = MissionGalleries::all();
		return View::make('mission_gallery.create')
			->with('galleries',$galleries)
			->with('conf',$conf);
	}

	public function action_itemCreate()
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
		
		$galleries = MissionGalleries::all();
		return View::make('mission_gallery.create')
			->with('galleries',$galleries)
			->with('conf',$conf);

	}
	public function action_itemSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$gallery = new MissionGalleries;
		
		$gallery->item_name = Input::get('item_name');
		$gallery->description = Input::get('description');
		$gallery->quantity = Input::get('quantity');
		$gallery->source = Input::get('source');
		$gallery->date_of_registration = Input::get('date_of_registration');
		$gallery->remarks = Input::get('remarks');
		$gallery->save();
		return Redirect::to('mission_gallery')
			->with('conf',4);

		
	}
	public function action_itemEdit($id)
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
		$gallery = MissionGalleries::find($id);
		$galleries = MissionGalleries::all();
		
		return View::make('mission_gallery.edit')
			->with('conf',$conf)
			->with('galleries',$galleries)
			->with('gallery',$gallery);

	}
	public function action_itemUpdate()
	{
		$id = Input::get('id');
		$gallery = MissionGalleries::find($id);
		$gallery->item_name = Input::get('item_name');
		$gallery->description = Input::get('description');
		$gallery->quantity = Input::get('quantity');
		$gallery->source = Input::get('source');
		$gallery->date_of_registration = Input::get('date_of_registration');
		$gallery->remarks = Input::get('remarks');
		$gallery->save();
		return Redirect::to('mission_gallery')
			->with('conf',5);
	}
	public function action_itemDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$gallery = MissionGalleries::find($id);
		if($gallery)
		{
			$gallery->delete();
			return Redirect::to('mission_gallery')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('mission_gallery')
				->with('conf',2);

		}
		
	}

	public function action_itemExisting()
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
		$galleries=MissionGalleries::all();
		return View::make('mission_gallery.list')
			->with('conf',$conf)
			->with('galleries',$galleries);
	}

}