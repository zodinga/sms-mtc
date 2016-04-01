@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Book successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Book Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Book Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Book successfully Added...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Book successfully Updated...</div>
	@endif

    <div class="col-md-12">
        <h3>Search Result</h3>
        <hr>
         <form class="form-inline" method="POST" action="/book_purchased_received/search">
            <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
            </div>
            or
            <div class="input-group">
                <input type="text"  class="form-control" name="author_editors" placeholder="Enter Author/Editor">
            </div>
            or  
            <div class="input-group">
                <input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" placeholder="Enter Date of Purchase">
            </div>
            or  
            <div class="input-group">
                <input type="text" class="form-control" name="source" placeholder="Enter Source">
            </div>
                       
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
            </div>
        </form>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
        			<td><strong>Title</strong></td>
        			<td><strong>Author/Editors</strong></td>
        			<td><strong>Quantity</strong></td>
        			<td><strong>Price</strong></td>
        			<td><strong>Purchasing Price</strong></td>
        			<td><strong>Date of Purchase</strong></td>
        			<td><strong>Source</strong></td>
        			<td><strong>Remarks</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($books as $book)
        		<tr>
        			<td>{{$book->id}}</td>
        			<td>{{$book->title}}</td>
        			<td>{{$book->author_editors ? $book->author_editors : '-'}}</td>
        			<td>{{$book->quantity ? $book->quantity : '-'}}</td>
        			<td>{{$book->price ? $book->price : '-'}}</td>
        			<td>{{$book->purchasing_price ? $book->purchasing_price : '-'}}</td>
        			<?php $date=date_create($book->date_of_purchase); ?>
        			<td>{{$book->date_of_purchase ? date_format($date,"d/M/Y") : '-'}}</td>
        			<td>{{$book->source ? $book->source : '-'}}</td>
        			<td>{{$book->remarks ? $book->remarks : '-'}}</td>
        			<td>
        				<button type="button" class="btn btn-success" onclick="location.href='/book_purchased_received/bookEdit/{{$book->id}}'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
        				<button type="button" class="btn btn-danger" onclick="location.href='/book_purchased_received/bookDelete/{{$book->id}}'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
        				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$book->id}}"><span class="glyphicon glyphicon-list" aria-hidden="true" ></span> View Details</button>
        				<div class="modal fade" id="myModal{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Book Details : </h4>
							      	</div>
							      	<div class="modal-body">
							      	<table class="table table-hover">
							        	
										<tr>
										    <td>Title</td>
										    <td>{{$book->title}}</td>
										</tr>

										<tr>
										    <td>Author/Editors</td>
										    <td>{{$book->author_editors}}</td>
										</tr>

										<tr>
										    <td>Quantity</td>
										    <td>{{$book->quantity}}</td>
										</tr>

										<tr>
										    <td>Price</td>
										    <td>{{$book->price}}</td>
										</tr>

										<tr>
										    <td>Purchasing Price</td>
										    <td>{{$book->purchasing_price}}</td>
										</tr>

										<tr>
										    <td>Date of Purchase</td>
										    <?php $date=date_create($book->date_of_purchase); ?>
											<td>{{date_format($date,"d/M/Y")}}</td>
										</tr>

										<tr>
										    <td>Source</td>
										    <td>{{$book->source}}</td>
										</tr>

										<tr>
										    <td>Remarks</td>
										    <td>{{$book->remarks}}</td>
										</tr>
									</table>
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true" ></span> Close</button>
							      	</div>
							    </div>
							</div>
						</div>
        			</td>
        		</tr>
        		@endforeach
        	</tbody>
		</table>
		
    </div>

	
</div>
@endsection