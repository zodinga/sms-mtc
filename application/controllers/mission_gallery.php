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
		$filename=$this->upload($gallery->id);
		$gallery->photo=$filename;
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

		$input = Input::all();
		
		if($input['photo1']['name'])
		{
			$filename=$this->upload($gallery->id);
			$gallery->photo=$filename;
			$gallery->save();
		}
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

	public function action_search()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$galleries = MissionGalleries::where('id','>',0);
		if(Input::has('item_name'))
		{
			$galleries->where('item_name','LIKE','%'.Input::get('item_name').'%');
		}
		if(Input::has('description'))
		{
			$galleries->where('description','LIKE','%'.Input::get('description').'%');
		}
		if(Input::has('source'))
		{
			$galleries->where('source','LIKE','%'.Input::get('source').'%');
		}
		if(Input::has('date_of_registration'))
		{
			$galleries->where('date_of_registration','=',Input::get('date_of_registration'));
		}
		
	
		$galleries = $galleries->get();
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		return View::make('mission_gallery.searchResult')
			->with('conf',$conf)
			->with('galleries',$galleries);


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
          
        $directory = path('public').'/image/mission/';

        $filename = "mission_gallery_".time()."_".$photo_id.".{$extension}";

        $upload_success = Input::upload('photo1', $directory, $filename);
        if( $upload_success ) {
            
            return $filename;
        } else {
            Session::flash('status_error', 'An error occurred while uploading your new Photo - please try again.');
        }
        
    }

}