@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Designation successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Designation Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Designation Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Designation successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Designation successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>Edit Designation</h3>
        <hr>
        <form class="form-horizontal" action="/designation/designationUpdate" method="POST">
			<div class="form-group">
			    <label for="designation" class="col-sm-2 control-label">Designation</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="designation" name="designation" value="{{$designation->designation}}">
			    </div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input type="hidden" value="{{$designation->id}}" name="id">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing Designations</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Designation</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($designations as $designation)
				<tr>
					<td>{{$designation->id}}</td>
					<td>{{$designation->designation}}</td>
					<td>
						<button type="button" onclick="location.href='/designation/designationEdit/{{$designation->id}}'" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
						<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$designation->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{$designation->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								    </div>
									<div class="modal-body">
							        Are You Sure to Delete Designation ID: {{$designation->id}}
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								        <button type="button" onclick="location.href='/designation/designationDelete/{{$designation->id}}'" class="btn btn-danger">Delete</button>
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