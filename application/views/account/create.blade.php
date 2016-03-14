@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Account successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Account Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Account Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Account successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Account successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>New Account</h3>
        <hr>
        <form class="form-horizontal" action="/account/accountSave" method="POST">
			<div class="form-group">
			    <label for="username" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required title="Username Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      	<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required title="Password Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="repassword" class="col-sm-2 control-label">Retype Password</label>
			    <div class="col-sm-10">
			      	<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter Retype Password" required title="Please Retype Password">
			    </div>
			</div>
			  
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      	<button type="submit" class="btn btn-success">Save</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing Accounts</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Username</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->username}}</td>
					<td>
						<button type="button" onclick="location.href='/account/accountEdit/{{$user->id}}'" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
						<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
				    </div>
					<div class="modal-body">
			        Are You Sure to Delete
			      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
				        <button type="button" onclick="location.href='/account/accountDelete/{{$user->id}}'" class="btn btn-danger">Delete</button>
			      	</div>
		    	</div>
		  	</div>
		</div>			
	</div>
</div>
@endsection