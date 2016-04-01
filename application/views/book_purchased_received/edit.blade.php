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
    <div class="col-md-6">

        <h3>Edit Item</h3>
        <hr>
        <form class="form-horizontal" action="/book_purchased_received/bookUpdate" method="POST">
			<div class="form-group">
			    <label for="title" class="col-sm-2 control-label">Title</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="title" name="title" value="{{$book->title}}" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="author_editors" class="col-sm-2 control-label">Author/Editor</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="author_editors" name="author_editors" value="{{$book->author_editors}}" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
			    <div class="col-sm-10">
			      	<input type="number" class="form-control" name="quantity" value="{{$book->quantity}}" id="quantity" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="price" class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      	<input type="number" step="0.01" class="form-control" name="price" value="{{$book->price}}" id="price" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="purchasing_price" class="col-sm-2 control-label">Purchasing Price</label>
			    <div class="col-sm-10">
			      	<input type="number" step="0.01" class="form-control" name="purchasing_price" value="{{$book->purchasing_price}}" id="purchasing_price" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="date_of_purchase" class="col-sm-2 control-label">Date of Purchase</label>
			    <div class="col-sm-4">
			    	<?php 
				    	$time = strtotime($book->date_of_purchase);
						$dop = date('Y-m-d',$time);
					?>
			      	<input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" value="{{$dop}}" placeholder="Enter Date of Purchase">
			    </div>
			</div>

			<div class="form-group">
			    <label for="source" class="col-sm-2 control-label">Source</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="source" value="{{$book->source}}" id="source" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="remarks" class="col-sm-2 control-label">Remarks</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="remarks" value="{{$book->remarks}}" id="remarks"  >
			    </div>
			</div>

			
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input type="hidden" value="{{$book->id}}" name="id">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing Books : Total {{BookPurchasedReceiveds::count()}}</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td><b>Title</b></td>
					<td>Author/Editor</td>
					<td>Qty</td>
					<!--<td>Price</td>-->
					<!--<td>Purchasing Price</td>-->
					<td>Purchase Dt.</td>
					<!--<td>Source</td>-->
					<!--<td>Remarks</td>-->
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($books as $book)
				<tr>
					<td>{{$book->id}}</td>
					<td>{{$book->title}}</td>
					<td>{{$book->author_editors}}</td>
					<td>{{$book->quantity}}</td>
					<!--<td>{{$book->price}}</td>-->
					<!--<td>{{$book->purchasing_price}}</td>-->
					<?php $date=date_create($book->date_of_purchase); ?>
					<td>{{date_format($date,"d/M/Y")}}</td>
					<!--<td>{{$book->source}}</td>-->
					<!--<td>{{$book->remarks}}</td>-->
					<td>
						<button type="button" onclick="location.href='/book_purchased_received/bookEdit/{{$book->id}}'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
						<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$book->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								    </div>
									<div class="modal-body">
							        Are You Sure to Delete Book ID : {{$book->id}}
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								        <button type="button" onclick="location.href='/book_purchased_received/bookDelete/<?php echo $book->id ? $book->id : '-';?>'" class="btn btn-danger">Delete</button>
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