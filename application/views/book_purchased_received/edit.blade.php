@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Mission Gallery Item successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Mission Gallery Item Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Mission Gallery Item Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Mission Gallery Item successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Mission Gallery Item successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>Edit Item</h3>
        <hr>
        <form class="form-horizontal" action="/mission_gallery/itemUpdate" method="POST">
			<div class="form-group">
			    <label for="item_name" class="col-sm-2 control-label">Item Name</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="item_name" name="item_name" value="{{$gallery->item_name}}" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="description" class="col-sm-2 control-label">Description</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="description" name="description" value="{{$gallery->description}}" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
			    <div class="col-sm-10">
			      	<input type="number" class="form-control" name="quantity" value="{{$gallery->quantity}}" id="quantity" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="source" class="col-sm-2 control-label">Source</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="source" value="{{$gallery->source}}" id="source" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="date_of_registration" class="col-sm-2 control-label">Reg. Date</label>
			    <div class="col-sm-4">
			    	<?php 
				    	$time = strtotime($gallery->date_of_registration);
						$dor = date('Y-m-d',$time);
					?>
			      	<input type="date" class="form-control" id="date_of_registration" name="date_of_registration" value="{{$dor}}" placeholder="Enter Date of Registration">
			    </div>
			</div>

			<div class="form-group">
			    <label for="remarks" class="col-sm-2 control-label">Remarks</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="remarks" value="{{$gallery->remarks}}" id="remarks"  >
			    </div>
			</div>

			
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input type="hidden" value="{{$gallery->id}}" name="id">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing Items</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Item Name</td>
					<td>Description</td>
					<td>Qty</td>
					<td>Source</td>
					<td>Date of Register</td>
					<td>Remarks</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($galleries as $gallery)
				<tr>
					<td>{{$gallery->id}}</td>
					<td>{{$gallery->item_name}}</td>
					<td>{{$gallery->description}}</td>
					<td>{{$gallery->quantity}}</td>
					<td>{{$gallery->source}}</td>
					<?php $date=date_create($gallery->date_of_registration); ?>
					<td>{{date_format($date,"d/M/Y")}}</td>
					<td>{{$gallery->remarks}}</td>
					<td>
						<button type="button" onclick="location.href='/mission_gallery/itemEdit/{{$gallery->id}}'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
						<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$gallery->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								    </div>
									<div class="modal-body">
							        Are You Sure to Delete Item ID : {{$gallery->id}}
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								        <button type="button" onclick="location.href='/mission_gallery/itemDelete/<?php echo $gallery->id ? $gallery->id : '-';?>'" class="btn btn-danger">Delete</button>
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