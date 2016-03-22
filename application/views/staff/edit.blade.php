@layout('dashboard')
@section('content')
<div class="row">
	
    <div class="col-md-6">
        <h3>Edit Staff</h3>
        <hr>
        <form class="form-horizontal" action="/staff/staffUpdate" method="POST">
			
			<div class="form-group">
			    <label for="name" class="col-sm-4 control-label">Staff Name</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$staff->name}}" class="form-control" id="name" name="name" placeholder="Enter Staff name" required title="Staff name Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="fname" class="col-sm-4 control-label">Father's Name</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$staff->fname}}" class="form-control" id="fname" name="fname" placeholder="Enter Father's name">
			    </div>
			</div>

			<div class="form-group">
			    <label for="pob" class="col-sm-4 control-label">Contact</label>
			    <div class="col-sm-8">
			    	<input type="text" value="{{$staff->contact_no}}" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact No">
			    </div>
			</div>

			<div class="form-group">
			    <label for="pob" class="col-sm-4 control-label">Designation</label>
			    <div class="col-sm-8">
			    	<input type="text" value="{{$staff->desig}}" class="form-control" id="desig" name="desig" placeholder="Enter Designation" required title="Designation Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="dob" class="col-sm-4 control-label">Date of Joining</label>
			    <div class="col-sm-4">
			    	<?php 
				    	$time = strtotime($staff->date_of_joining);
						$date_of_joining = date('Y-m-d',$time);
					?>
			      	<input type="date" value="{{$date_of_joining}}" class="form-control" id="date_of_joining" name="date_of_joining" placeholder="Enter Date of Joining">
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="dob" class="col-sm-4 control-label">Date of Birth</label>
			    <div class="col-sm-4">
			    	<?php 
				    	$time = strtotime($staff->dob);
						$dob = date('Y-m-d',$time);
					?>
			      	<input type="date" value="{{$dob}}" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth">
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="gender" class="col-sm-4 control-label">Gender</label>
			    <div class="col-sm-4">
			      	<select class="form-control" id="gender" name="gender" required>
					  	<option selected="selected" value="{{$staff->gender}}">{{$staff->gender}}</option>
					  	<option value="Male">Male</option>
					  	<option value="Female">Female</option>
					</select>
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="nationality" class="col-sm-4 control-label">Address</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$staff->address}}" class="form-control" id="address" name="address" placeholder="Enter Address">
			    </div>
			</div>
		
			<div class="form-group">
			    <label for="local_church_address" class="col-sm-4 control-label">Qualification</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$staff->qualification}}" class="form-control" id="qualification" name="qualification" placeholder="Enter Qualification">
			    </div>
			</div>

			<div class="form-group">
			    <label for="remarks" class="col-sm-4 control-label">Remarks</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$staff->remarks}}"  class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
			    </div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-5 col-sm-7">
			    	<input type="hidden" name="id" value="{{$staff->id}}">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	
</div>
@endsection