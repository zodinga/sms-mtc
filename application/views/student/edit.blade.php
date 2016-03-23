@layout('dashboard')
@section('content')
<div class="row">
	
    <div class="col-md-6">
        <h3>Edit Student</h3>
        <hr>
        <form class="form-horizontal" action="/student/studentUpdate" method="POST">
			@if($scp->name == "on")
			<div class="form-group">
			    <label for="name" class="col-sm-4 control-label">Student Name</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->name}}" class="form-control" id="name" name="name" placeholder="Enter Student name" required title="Student name Required">
			    </div>
			</div>
			@endif

			@if($scp->fname == "on")
			<div class="form-group">
			    <label for="fname" class="col-sm-4 control-label">Father's Name</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->fname}}" class="form-control" id="fname" name="fname" placeholder="Enter Father's name" required title="Student Father name Required">
			    </div>
			</div>
			@endif

			@if($scp->internal_registration == "on")
			<div class="form-group">
			    <label for="internal_registration" class="col-sm-4 control-label">Internal Registration No</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->internal_registration}}" class="form-control" id="internal_registration" name="internal_registration" placeholder="Enter Internal Registration No" >
			    </div>
			</div>
			@endif

			@if($scp->university_registration == "on")
			<div class="form-group">
			    <label for="university_registration" class="col-sm-4 control-label">University Registration No</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->university_registration}}"  class="form-control" id="university_registration" name="university_registraton" placeholder="Enter University Registration No" >
			    </div>
			</div>
			@endif

			@if($scp->dob == "on")
			<div class="form-group">
			    <label for="dob" class="col-sm-4 control-label">Date of Birth</label>
			    <div class="col-sm-4">
			    	<?php 
				    	$time = strtotime($student->dob);
						$dob = date('Y-m-d',$time);
					?>
			      	<input type="date" value="{{$dob}}" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth" required title="Date of Birth Required">
			    </div>
			</div>
			@endif

			@if($scp->pob == "on")
			<div class="form-group">
			    <label for="pob" class="col-sm-4 control-label">Place of Birth</label>
			    <div class="col-sm-8">
			    	<input type="text" value="{{$student->pob}}" class="form-control" id="pob" name="pob" placeholder="Enter Place of Birth" required title="Place of Birth Required">
			    </div>
			</div>
			@endif


			@if($scp->gender == "on")
			<div class="form-group">
			    <label for="gender" class="col-sm-4 control-label">Gender</label>
			    <div class="col-sm-4">
			      	<select class="form-control" id="gender" name="gender" required>
					  	<option selected="selected" value="{{$student->gender}}">{{$student->gender}}</option>
					  	<option value="Male">Male</option>
					  	<option value="Female">Female</option>
					</select>
			    </div>
			</div>
			@endif
			
			@if($scp->nationality == "on")
			<div class="form-group">
			    <label for="nationality" class="col-sm-4 control-label">Nationality</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->nationality}}" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" required title="Nationality Required">
			    </div>
			</div>
			@endif

			@if($scp->contact_no == "on")
			<div class="form-group">
			    <label for="contact_no" class="col-sm-4 control-label">Contact no</label>
			    <div class="col-sm-4">
			      	<input type="number" value="{{$student->contact_no}}" min="1" min="99999999999" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact" required title="Contact No Required">
			    </div>
			</div>
			@endif

			@if($scp->local_church_address == "on")
			<div class="form-group">
			    <label for="local_church_address" class="col-sm-4 control-label">Local Church Address</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->local_church_address}}" class="form-control" id="local_church_address" name="local_church_address" placeholder="Enter Local Church Address" required title="Local Church Address Required">
			    </div>
			</div>
			@endif

			@if($scp->street == "on")
			<div class="form-group">
			    <label for="street" class="col-sm-4 control-label">Street</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->street}}" class="form-control" id="street" name="street" placeholder="Enter Street" required title="Street Required">
			    </div>
			</div>
			@endif

			@if($scp->town == "on")
			<div class="form-group">
			    <label for="town" class="col-sm-4 control-label">Town</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->town}}" class="form-control" id="town" name="town" placeholder="Enter Town" required title="Town Required">
			    </div>
			</div>
			@endif

			@if($scp->district == "on")
			<div class="form-group">
			    <label for="district" class="col-sm-4 control-label">District</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->district}}" class="form-control" id="district" name="district" placeholder="Enter District" required title="District Required">
			    </div>
			</div>
			@endif

			@if($scp->state == "on")
			<div class="form-group">
			    <label for="state" class="col-sm-4 control-label">State</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->state}}" class="form-control" id="state" name="state" placeholder="Enter State" required title="State Required">
			    </div>
			</div>
			@endif

			@if($scp->pin == "on")
			<div class="form-group">
			    <label for="pin" class="col-sm-4 control-label">PIN Code</label>
			    <div class="col-sm-3">
			      	<input type="number" value="{{$student->pin}}" min="1" max="9999999"class="form-control" id="pin" name="pin" placeholder="Enter PIN" required title="PIN No Required">
			    </div>
			</div>
			@endif

			@if($scp->pstreet == "on")
			<div class="form-group">
			    <label for="pstreet" class="col-sm-4 control-label">Present Street</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->pstreet}}" class="form-control" id="pstreet" name="pstreet" placeholder="Enter Present Street" required title="Present Street Required">
			    </div>
			</div>
			@endif

			@if($scp->ptown == "on")
			<div class="form-group">
			    <label for="ptown" class="col-sm-4 control-label">Present Town</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->ptown}}" class="form-control" id="ptown" name="ptown" placeholder="Enter Present Town" required title="Present Town Required">
			    </div>
			</div>
			@endif

			@if($scp->pdistrict == "on")
			<div class="form-group">
			    <label for="pdistrict" class="col-sm-4 control-label">Present District</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->pdistrict}}" class="form-control" id="pdistrict" name="pdistrict" placeholder="Enter Present District" required title="Present District Required">
			    </div>
			</div>
			@endif

			@if($scp->pstate == "on")
			<div class="form-group">
			    <label for="pstate" class="col-sm-4 control-label">Present State</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->pstate}}" class="form-control" id="pstate" name="pstate" placeholder="Enter Present State" required title="Present State Required">
			    </div>
			</div>
			@endif

			@if($scp->ppin == "on")
			<div class="form-group">
			    <label for="ppin" class="col-sm-4 control-label">Present PIN Code</label>
			    <div class="col-sm-4">
			      	<input type="number" value="{{$student->ppin}}" min="1" max="9999999" class="form-control" id="ppin" name="ppin" placeholder="Enter Present PIN" required title="Present PIN No Required">
			    </div>
			</div>
			@endif

			@if($scp->guardian_name == "on")
			<div class="form-group">
			    <label for="guardian_name" class="col-sm-4 control-label">Guardian Name</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->guardian_name}}" class="form-control" id="guardian_name" name="guardian_name" placeholder="Enter Guardian Name" required title="Guardian Name Required">
			    </div>
			</div>
			@endif

			@if($scp->guardian_address == "on")
			<div class="form-group">
			    <label for="guardian_address" class="col-sm-4 control-label">Guardian Address</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->guardian_address}}" class="form-control" id="guardian_address" name="guardian_address" placeholder="Enter Guardian Address" required title="Guardian Address Required">
			    </div>
			</div>
			@endif

			@if($scp->yoa == "on")
			<div class="form-group">
			    <label for="yoa" class="col-sm-4 control-label">Year of Admission</label>
			    <div class="col-sm-2">
			      	<input type="number" value="{{$student->yoa}}" min="1" max="9999" class="form-control" id="yoa" name="yoa" placeholder="YYYY" required title="Year of Admission Required">
			    </div>
			</div>
			@endif

			@if($scp->batch == "on")
			<div class="form-group">
			    <label for="batch" class="col-sm-4 control-label">Batch</label>
			    <div class="col-sm-4">
			      	<input type="number" value="{{$student->batch}}" min="1" max="10000" class="form-control" id="batch" name="batch" placeholder="Enter Batch No" required title="Batch No Required">
			    </div>
			</div>
			@endif


			@if($scp->ten_board == "on")
			<div class="form-group">
			    <label for="ten_board" class="col-sm-4 control-label">Class 10 Board</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->ten_board}}"  class="form-control" id="ten_board" name="ten_board" placeholder="Enter Class 10 Board" required title="Class 10 Board Required">
			    </div>
			</div>
			@endif


			@if($scp->ten_year == "on")
			<div class="form-group">
			    <label for="ten_year" class="col-sm-4 control-label">Class 10 Year of Passing</label>
			    <div class="col-sm-3">
			      	<input type="number" value="{{$student->ten_year}}"  class="form-control" id="ten_year" name="ten_year" placeholder="Enter Class 10 Year" required title="Class 10 Year of Passing Required">
			    </div>
			</div>
			@endif


			@if($scp->ten_degree == "on")
			<div class="form-group">
			    <label for="ten_degree" class="col-sm-4 control-label">Class 10 Degree</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->ten_degree}}"  class="form-control" id="ten_degree" name="ten_degree" placeholder="Enter Class 10 Degree" required title="Class 10 Degree Required">
			    </div>
			</div>
			@endif

			@if($scp->ten_division == "on")
			<div class="form-group">
			    <label for="ten_division" class="col-sm-4 control-label">Class 10 Division</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->division}}"  class="form-control" id="ten_division" name="ten_division" placeholder="Enter Class 10 Division" required title="Class 10 Division Required">
			    </div>
			</div>
			@endif

			@if($scp->twelve_board == "on")
			<div class="form-group">
			    <label for="twelve_board" class="col-sm-4 control-label">Class 12 Board</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->twelve_board}}"  class="form-control" id="twelve_board" name="twelve_board" placeholder="Enter Class 12 Board" required title="Class 12 Board Required">
			    </div>
			</div>
			@endif


			@if($scp->twelve_year == "on")
			<div class="form-group">
			    <label for="twelve_year" class="col-sm-4 control-label">Class 12 Year of Passing</label>
			    <div class="col-sm-3">
			      	<input type="number" value="{{$student->twelve_year}}"  class="form-control" id="twelve_year" name="twelve_year" placeholder="Enter Class 12 Year" required title="Class 12 Year of Passing Required">
			    </div>
			</div>
			@endif


			@if($scp->twelve_degree == "on")
			<div class="form-group">
			    <label for="twelve_degree" class="col-sm-4 control-label">Class 12 Degree</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->twelve_degree}}"  class="form-control" id="twelve_degree" name="twelve_degree" placeholder="Enter Class 12 Degree" required title="Class 12 Degree Required">
			    </div>
			</div>
			@endif

			@if($scp->twelve_division == "on")
			<div class="form-group">
			    <label for="twelve_division" class="col-sm-4 control-label">Class 12 Division</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->twelve_division}}"  class="form-control" id="twelve_division" name="twelve_division" placeholder="Enter Class 12 Division" required title="Class 12 Division Required">
			    </div>
			</div>
			@endif


			@if($scp->degree_board == "on")
			<div class="form-group">
			    <label for="degree_board" class="col-sm-4 control-label">Degree Board/University</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->degree_board}}"  class="form-control" id="degree_board" name="degree_board" placeholder="Enter Degree Board/University" required title="Degree Board/University Required">
			    </div>
			</div>
			@endif


			@if($scp->degree_year == "on")
			<div class="form-group">
			    <label for="degree_year" class="col-sm-4 control-label">Degree Year of Passing</label>
			    <div class="col-sm-3">
			      	<input type="number" value="{{$student->degree_year}}"  class="form-control" id="degree_year" name="degree_year" placeholder="Enter Degree Year" required title="Degree Year of Passing Required">
			    </div>
			</div>
			@endif


			@if($scp->degree_degree == "on")
			<div class="form-group">
			    <label for="degree_degree" class="col-sm-4 control-label">Degree</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->degree_degree}}"  class="form-control" id="degree_degree" name="degree_degree" placeholder="Enter Degree" required title="Degree Required">
			    </div>
			</div>
			@endif

			@if($scp->degree_division == "on")
			<div class="form-group">
			    <label for="degree_division" class="col-sm-4 control-label">Degree Division</label>
			    <div class="col-sm-4">
			      	<input type="text" value="{{$student->degree_division}}"  class="form-control" id="degree_division" name="degree_division" placeholder="Enter Degree Division" required title="Degree Division Required">
			    </div>
			</div>
			@endif



			@if($scp->job_id == "on")
			<div class="form-group">
			    <label for="job_id" class="col-sm-4 control-label">Designation</label>
			    <div class="col-sm-4">
			      	<?php 
			      		$designations = Designations::all(); 
			      		$designation = Designations::find($student->job_id);
			      	?>
			    	<select class="form-control" id="job_id" name="job_id" required>
			    		<option selected="selected" value="{{$student->job_id}}">{{$designation ? $designation->designation : '-'}}</option>
			    		@foreach($designations as $designation)
			    			<option value="{{$designation->id}}">{{$designation->designation}}</option>
			    		@endforeach
			    	</select>
			    </div>
			</div>
			@endif

			@if($scp->jobs_place == "on")
			<div class="form-group">
			    <label for="jobs_place" class="col-sm-4 control-label">Job Place</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->jobs_place}}"  class="form-control" id="jobs_place" name="jobs_place" placeholder="Enter Job Place" required title="Job Place Required">
			    </div>
			</div>
			@endif

			@if($scp->jobs_field == "on")
			<div class="form-group">
			    <label for="jobs_field" class="col-sm-4 control-label">Field Name</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->jobs_field}}"  class="form-control" id="jobs_field" name="jobs_field" placeholder="Enter Field Name" required title="Field Name Required">
			    </div>
			</div>
			@endif

			@if($scp->yoj == "on")
			<div class="form-group">
			    <label for="yoj" class="col-sm-4 control-label">Year of joining</label>
			    <div class="col-sm-3">
			      	<input type="number" value="{{$student->yoj}}"  class="form-control" id="yoj" name="yoj" placeholder="Enter Year of Joining" required title="Year of joining Required">
			    </div>
			</div>
			@endif

			@if($scp->status == "on")
			<div class="form-group">
			    <label for="status" class="col-sm-4 control-label">Status</label>
			    <div class="col-sm-3">
			    	<select class="form-control" name="status" required title="Status Required">
			    		<option selected="selected" value="{{$student->status}}">{{$student->status}}</option>
			    		<option value="Ongoing">Ongoing</option>
			    		<option value="Completed">Completed</option>
			    		<option value="Discontinue">Discontinue</option>
			    		<option value="Dropout">Dropout</option>
			    		<option value="Other">Other</option>
			    	</select>
			    </div>
			</div>
			@endif

			@if($scp->remarks == "on")
			<div class="form-group">
			    <label for="remarks" class="col-sm-4 control-label">Remarks</label>
			    <div class="col-sm-8">
			      	<input type="text" value="{{$student->remarks}}"  class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" required title="Remarks Required">
			    </div>
			</div>
			@endif


			<div class="form-group">
			    <div class="col-sm-offset-5 col-sm-7">
			    	<input type="hidden" name="id" value="{{$student->id}}">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	
</div>
@endsection