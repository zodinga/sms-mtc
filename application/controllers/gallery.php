<?php

class Gallery_Controller extends Base_Controller {

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
		
		$galleries = Galleries::all();
		return View::make('gallery.create')
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
		
		$galleries = Galleries::all();
		return View::make('gallery.create')
			->with('galleries',$galleries)
			->with('conf',$conf);

	}
	public function action_itemSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$gallery = new Galleries;
		
		$gallery->title = Input::get('title');
		$gallery->save();
		$filename=$this->upload($gallery->id);
		$gallery->photo=$filename;
		$gallery->save();
		return Redirect::to('gallery')
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
		$gallery = Galleries::find($id);
		$galleries = Galleries::all();
		
		return View::make('gallery.edit')
			->with('conf',$conf)
			->with('galleries',$galleries)
			->with('gallery',$gallery);

	}
	public function action_itemUpdate()
	{
		$id = Input::get('id');
		$gallery = Galleries::find($id);
		$gallery->title = Input::get('title');
		$gallery->save();
		$filename=$this->upload($gallery->id);
		$gallery->photo=$filename;
		$gallery->save();
		return Redirect::to('gallery')
			->with('conf',5);
	}
	public function action_itemDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$gallery = Galleries::find($id);
		if($gallery)
		{
			$gallery->delete();
			return Redirect::to('gallery')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('gallery')
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
		$galleries=Galleries::all();
		return View::make('gallery.list')
			->with('conf',$conf)
			->with('galleries',$galleries);
	}

	public function action_search()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$galleries = Galleries::where('id','>',0);
		if(Input::has('item_name'))
		{
			$galleries->where('title','LIKE','%'.Input::get('title').'%');
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
		return View::make('gallery.searchResult')
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
        	//dd($photo_id);
            return Redirect::to('dashboard')->with_errors($validation);
        }

        $extension = File::extension($input['photo1']['name']);
          
        $directory = path('public').'/image/gallery/';

        $filename = "gallery_".$photo_id.".{$extension}";

        $upload_success = Input::upload('photo1', $directory, $filename);
         //dd($upload_success);
        if( $upload_success ) {
            
            return $filename;
        } else {
            Session::flash('status_error', 'An error occurred while uploading your new Photo - please try again.');
        }
        
    }

}