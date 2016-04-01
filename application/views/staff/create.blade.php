@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Staff successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Staff Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Staff Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Staff successfully added...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Staff successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>New Staff</h3>
        <hr>
        <form class="form-horizontal" action="/staff/staffSave" method="POST" enctype="multipart/form-data">
        	
        	<div class="form-group">
			    <label for="photo" class="col-sm-3 control-label">Photo</label>
			    <div class="col-sm-8">
					<script>
						function img_pathUrl(input){
						   $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
						}
					</script>
					<img src="img_url" onerror="this.src='/image/default.png';"id="img" alt="Upload your image" width="10%" height="10%" class="img-rounded" style="border:1px solid black">
			      	<input type="file" class="form-control" id="photo1" name="photo1" placeholder="Choose a photo to upload" onChange="img_pathUrl(this);">

			    </div>
			</div>

			<div class="form-group">
			    <label for="name" class="col-sm-3 control-label">Name</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="name" name="name" placeholder="Enter Staff name" required title="Staff name Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="fname" class="col-sm-3 control-label">Father's Name</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Fathers name">
			    </div>
			</div>

			<div class="form-group">
			    <label for="contact_no" class="col-sm-3 control-label">Mobile No</label>
			    <div class="col-sm-3">
			      	<input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Mobile No">
			    </div>
			</div>

			<div class="form-group">
			    <label for="desig" class="col-sm-3 control-label">Designation</label>
			    <div class="col-sm-4">
			      	<select class="form-control" id="desig" name="desig" required>
			    		<option selected="selected" value="">---Select Designaion---</option>
			    		@foreach($designations as $designation)
			    			<option value="{{$designation->id}}">{{$designation->designation}}</option>
			    		@endforeach
			    	</select>
			    </div>
			</div>

			<div class="form-group">
			    <label for="date_of_joining" class="col-sm-3 control-label">Date of Joining</label>
			    <div class="col-sm-4">
			      	<input type="date" class="form-control" id="date_of_joining" name="date_of_joining" placeholder="Enter Date of Joining">
			    </div>
			</div>

			<div class="form-group">
			    <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
			    <div class="col-sm-4">
			      	<input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth">
			    </div>
			</div>

			<div class="form-group">
			    <label for="gender" class="col-sm-3 control-label">Gender</label>
			    <div class="col-sm-4">
			      	<select class="form-control" id="gender" name="gender">
					  	<option selected="selected" value="">---Select Gender---</option>
					  	<option value="Male">Male</option>
					  	<option value="Female">Female</option>
					</select>
			    </div>
			</div>

			<div class="form-group">
			    <label for="address" class="col-sm-3 control-label">Address</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
			    </div>
			</div>

			<div class="form-group">
			    <label for="qualification" class="col-sm-3 control-label">Qualification</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" name="qualification" id="qualification" placeholder="Enter Qualification">
			    </div>
			</div>

			<div class="form-group">
			    <label for="remarks" class="col-sm-3 control-label">Remarks</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks">
			    </div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-3 col-sm-10">
			      	<button type="submit" class="btn btn-success">Save</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing Staffs</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Name</td>
					<td>Contact</td>
					<td>Designation</td>
					<td>Date of Joining</td>
					<td>Address</td>
				</tr>
			</thead>
			<tbody>
				@foreach($staff as $staff)
				<tr>
					<td>{{$staff->id}}</td>
					<td>{{$staff->name}}</td>
					<td>{{$staff->contact_no}}</td>
					<?php $desig = Designations::find($staff->desig);?>
        			<td>{{$desig->designation ? $desig->designation : '-'}}</td>
					<?php $date=date_create($staff->date_of_joining); ?>
					<td>{{date_format($date,"d/m/Y")}}</td>
					<td>{{$staff->address}}</td>
					<td>
						<button type="button" onclick="location.href='/staff/staffEdit/{{$staff->id}}'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
						<button type="button"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{$staff->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								    </div>
									<div class="modal-body">
							        Are You Sure to Delete Course ID : {{$staff->id}}
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								        <button type="button" onclick="location.href='/staff/staffDelete/<?php echo $staff->id ? $staff->id : '-';?>'" class="btn btn-danger">Delete</button>
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