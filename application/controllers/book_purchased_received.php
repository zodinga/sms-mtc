<?php

class Book_Purchased_Received_Controller extends Base_Controller {

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
		
		$books = BookPurchasedReceiveds::all();
		return View::make('book_purchased_received.create')
			->with('books',$books)
			->with('conf',$conf);
	}

	public function action_bookCreate()
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
		
		$books = BookPurchasedReceiveds::all();
		return View::make('book_purchased_received.create')
			->with('books',$books)
			->with('conf',$conf);

	}
	public function action_bookSave()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$book = new BookPurchasedReceiveds;
		
		$book->title = Input::get('title');
		$book->author_editors = Input::get('author_editors');
		$book->quantity = Input::get('quantity');
		$book->price = Input::get('price');
		$book->purchasing_price = Input::get('purchasing_price');
		$book->date_of_purchase = Input::get('date_of_purchase');
		$book->source = Input::get('source');
		$book->remarks = Input::get('remarks');
		$book->save();
		return Redirect::to('book_purchased_received')
			->with('conf',4);

		
	}
	public function action_bookEdit($id)
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
		$book = BookPurchasedReceiveds::find($id);
		$books = BookPurchasedReceiveds::all();
		
		return View::make('book_purchased_received.edit')
			->with('conf',$conf)
			->with('book',$book)
			->with('books',$books);

	}
	public function action_bookUpdate()
	{
		$id = Input::get('id');
		$book = BookPurchasedReceiveds::find($id);
		$book->title = Input::get('title');
		$book->author_editors = Input::get('author_editors');
		$book->quantity = Input::get('quantity');
		$book->price = Input::get('price');
		$book->purchasing_price = Input::get('purchasing_price');
		$book->date_of_purchase = Input::get('date_of_purchase');
		$book->source = Input::get('source');
		$book->remarks = Input::get('remarks');
		$book->save();
		return Redirect::to('book_purchased_received')
			->with('conf',5);
	}
	public function action_bookDelete($id)
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$book = BookPurchasedReceiveds::find($id);
		if($book)
		{
			$book->delete();
			return Redirect::to('book_purchased_received')
				->with('conf',1);
		}
		else
		{
			return Redirect::to('book_purchased_received')
				->with('conf',2);

		}
		
	}

	public function action_bookExisting()
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
		$books=BookPurchasedReceiveds::all();
		return View::make('book_purchased_received.list')
			->with('conf',$conf)
			->with('books',$books);
	}

	public function action_search()
	{
		if(Auth::guest())return Redirect::to('home')->with('conf',3);
		$book = BookPurchasedReceiveds::where('id','>',0);
		if(Input::has('title'))
		{
			$book->where('title','LIKE','%'.Input::get('title').'%');
		}
		if(Input::has('author_editors'))
		{
			$book->where('author_editors','LIKE','%'.Input::get('author_editors').'%');
		}
		if(Input::has('date_of_purchase'))
		{
			$book->where('date_of_purchase','=',Input::get('date_of_purchase'));
		}
		if(Input::has('source'))
		{
			$book->where('source','LIKE','%'.Input::get('source').'%');
		}
	
		$books = $book->get();
		if(Session::has('conf'))
		{
			$conf = Session::get('conf');
		}
		else
		{
			$conf = 0;
		}
		return View::make('book_purchased_received.searchResult')
			->with('conf',$conf)
			->with('books',$books);


	}

}