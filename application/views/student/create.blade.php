@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Student successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Student Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Student Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Student successfully added...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Student successfully Updated...</div>
	@endif

    <div class="col-md-6">
    	<?php $course = Courses::find($course_id); ?>
        <h3>New Student for {{$course->course}}</h3>
        <hr>
        <form class="form-horizontal" action="/student/studentSave" method="POST" enctype="multipart/form-data">
        	<input type="hidden" class="form-control" id="course_id" name="course_id" value="{{$course_id}}">

			@if($scp->photo == "on")
			<div class="form-group">
			    <label for="photo" class="col-sm-4 control-label">Photo</label>
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
			@endif

			@if($scp->name == "on")
			<div class="form-group">
			    <label for="name" class="col-sm-4 control-label">Student Name</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="name" name="name" placeholder="Enter Student name" required title="Student name Required">
			    </div>
			</div>
			@endif

			@if($scp->fname == "on")
			<div class="form-group">
			    <label for="fname" class="col-sm-4 control-label">Father's Name</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Father's name">
			    </div>
			</div>
			@endif

			@if($scp->internal_registration == "on")
			<div class="form-group">
			    <label for="internal_registration" class="col-sm-4 control-label">Internal Registration No</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="internal_registration" name="internal_registration" placeholder="Enter Internal Registration No" >
			    </div>
			</div>
			@endif

			@if($scp->university_registration == "on")
			<div class="form-group">
			    <label for="university_registration" class="col-sm-4 control-label">University Registration No</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="university_registration" name="university_registration" placeholder="Enter University Registration No" >
			    </div>
			</div>
			@endif

			@if($scp->dob == "on")
			<div class="form-group">
			    <label for="dob" class="col-sm-4 control-label">Date of Birth</label>
			    <div class="col-sm-4">
			      	<input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth">
			    </div>
			</div>
			@endif

			@if($scp->pob == "on")
			<div class="form-group">
			    <label for="pob" class="col-sm-4 control-label">Place of Birth</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="pob" name="pob" placeholder="Enter Place of Birth">
			    </div>
			</div>
			@endif


			@if($scp->gender == "on")
			<div class="form-group">
			    <label for="gender" class="col-sm-4 control-label">Gender</label>
			    <div class="col-sm-4">
			      	<select class="form-control" id="gender" name="gender">
					  	<option selected="selected" value="">---Select Gender---</option>
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
			      	<input type="text" class="form-control" id="nationality" value="Indian" name="nationality" placeholder="Enter Nationality">
			    </div>
			</div>
			@endif

			@if($scp->contact_no == "on")
			<div class="form-group">
			    <label for="contact_no" class="col-sm-4 control-label">Contact no</label>
			    <div class="col-sm-4">
			      	<input type="number" min="1" min="99999999999" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact">
			    </div>
			</div>
			@endif

			@if($scp->local_church_address == "on")
			<div class="form-group">
			    <label for="local_church_address" class="col-sm-4 control-label">Local Church Address</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="local_church_address" name="local_church_address" placeholder="Enter Local Church Address">
			    </div>
			</div>
			@endif

			@if($scp->street == "on")
			<div class="form-group">
			    <label for="street" class="col-sm-4 control-label">Street</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="street" name="street" placeholder="Enter Street">
			    </div>
			</div>
			@endif

			@if($scp->town == "on")
			<div class="form-group">
			    <label for="town" class="col-sm-4 control-label">Town</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="town" name="town" placeholder="Enter Town">
			    </div>
			</div>
			@endif

			@if($scp->district == "on")
			<div class="form-group">
			    <label for="district" class="col-sm-4 control-label">District</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="district" name="district" placeholder="Enter District">
			    </div>
			</div>
			@endif

			@if($scp->state == "on")
			<div class="form-group">
			    <label for="state" class="col-sm-4 control-label">State</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
			    </div>
			</div>
			@endif

			@if($scp->pin == "on")
			<div class="form-group">
			    <label for="pin" class="col-sm-4 control-label">PIN Code</label>
			    <div class="col-sm-3">
			      	<input type="number" min="1" max="9999999"class="form-control" id="pin" name="pin" placeholder="Enter PIN">
			    </div>
			</div>
			@endif

			@if($scp->pstreet == "on")
			<div class="form-group">
			    <label for="pstreet" class="col-sm-4 control-label">Present Street</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="pstreet" name="pstreet" placeholder="Enter Present Street">
			    </div>
			</div>
			@endif

			@if($scp->ptown == "on")
			<div class="form-group">
			    <label for="ptown" class="col-sm-4 control-label">Present Town</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="ptown" name="ptown" placeholder="Enter Present Town">
			    </div>
			</div>
			@endif

			@if($scp->pdistrict == "on")
			<div class="form-group">
			    <label for="pdistrict" class="col-sm-4 control-label">Present District</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="pdistrict" name="pdistrict" placeholder="Enter Present District">
			    </div>
			</div>
			@endif

			@if($scp->pstate == "on")
			<div class="form-group">
			    <label for="pstate" class="col-sm-4 control-label">Present State</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="pstate" name="pstate" placeholder="Enter Present State">
			    </div>
			</div>
			@endif

			@if($scp->ppin == "on")
			<div class="form-group">
			    <label for="ppin" class="col-sm-4 control-label">Present PIN Code</label>
			    <div class="col-sm-4">
			      	<input type="number" min="1" max="9999999" class="form-control" id="ppin" name="ppin" placeholder="Enter Present PIN">
			    </div>
			</div>
			@endif

			@if($scp->guardian_name == "on")
			<div class="form-group">
			    <label for="guardian_name" class="col-sm-4 control-label">Guardian Name</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="Enter Guardian Name">
			    </div>
			</div>
			@endif

			@if($scp->guardian_address == "on")
			<div class="form-group">
			    <label for="guardian_address" class="col-sm-4 control-label">Guardian Address</label>
			    <div class="col-sm-8">
			      	<input type="text" class="form-control" id="guardian_address" name="guardian_address" placeholder="Enter Guardian Address">
			    </div>
			</div>
			@endif

			@if($scp->yoa == "on")
			<div class="form-group">
			    <label for="yoa" class="col-sm-4 control-label">Year of Admission</label>
			    <div class="col-sm-2">
			      	<input type="number" min="1" max="9999" class="form-control" id="yoa" name="yoa" placeholder="YYYY">
			    </div>
			</div>
			@endif

			@if($scp->batch == "on")
			<div class="form-group">
			    <label for="batch" class="col-sm-4 control-label">Batch</label>
			    <div class="col-sm-4">
			      	<input type="number" min="1" max="10000" class="form-control" id="batch" name="batch" placeholder="Enter Batch No">
			    </div>
			</div>
			@endif


			@if($scp->ten_board == "on")
			<div class="form-group">
			    <label for="ten_board" class="col-sm-4 control-label">Class 10 Board</label>
			    <div class="col-sm-3">
			      	<input type="text"  class="form-control" id="ten_board" name="ten_board" placeholder="Enter Class 10 Board">
			    </div>
			</div>
			@endif


			@if($scp->ten_year == "on")
			<div class="form-group">
			    <label for="ten_year" class="col-sm-4 control-label">Class 10 Year of Passing</label>
			    <div class="col-sm-2">
			      	<input type="number"  class="form-control" id="ten_year" name="ten_year" placeholder="YYYY">
			    </div>
			</div>
			@endif


			@if($scp->ten_degree == "on")
			<div class="form-group">
			    <label for="ten_degree" class="col-sm-4 control-label">Class 10 Degree</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="ten_degree" name="ten_degree" placeholder="Enter Class 10 Degree">
			    </div>
			</div>
			@endif

			@if($scp->ten_division == "on")
			<div class="form-group">
			    <label for="ten_division" class="col-sm-4 control-label">Class 10 Division</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="ten_division" name="ten_division" placeholder="Enter Class 10 Division">
			    </div>
			</div>
			@endif

			@if($scp->twelve_board == "on")
			<div class="form-group">
			    <label for="twelve_board" class="col-sm-4 control-label">Class 12 Board</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="twelve_board" name="twelve_board" placeholder="Enter Class 12 Board">
			    </div>
			</div>
			@endif


			@if($scp->twelve_year == "on")
			<div class="form-group">
			    <label for="twelve_year" class="col-sm-4 control-label">Class 12 Year of Passing</label>
			    <div class="col-sm-2">
			      	<input type="number"  class="form-control" id="twelve_year" name="twelve_year" placeholder="YYYY">
			    </div>
			</div>
			@endif


			@if($scp->twelve_degree == "on")
			<div class="form-group">
			    <label for="twelve_degree" class="col-sm-4 control-label">Class 12 Degree</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="twelve_degree" name="twelve_degree" placeholder="Enter Class 12 Degree">
			    </div>
			</div>
			@endif

			@if($scp->twelve_division == "on")
			<div class="form-group">
			    <label for="twelve_division" class="col-sm-4 control-label">Class 12 Division</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="twelve_division" name="twelve_division" placeholder="Enter Class 12 Division">
			    </div>
			</div>
			@endif


			@if($scp->degree_board == "on")
			<div class="form-group">
			    <label for="degree_board" class="col-sm-4 control-label">Degree Board/University</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="degree_board" name="degree_board" placeholder="Enter Degree Board/University">
			    </div>
			</div>
			@endif


			@if($scp->degree_year == "on")
			<div class="form-group">
			    <label for="degree_year" class="col-sm-4 control-label">Degree Year of Passing</label>
			    <div class="col-sm-2">
			      	<input type="number"  class="form-control" id="degree_year" name="degree_year" placeholder="YYYY">
			    </div>
			</div>
			@endif


			@if($scp->degree_degree == "on")
			<div class="form-group">
			    <label for="degree_degree" class="col-sm-4 control-label">Degree</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="degree_degree" name="degree_degree" placeholder="Enter Degree">
			    </div>
			</div>
			@endif

			@if($scp->degree_division == "on")
			<div class="form-group">
			    <label for="degree_division" class="col-sm-4 control-label">Degree Division</label>
			    <div class="col-sm-4">
			      	<input type="text"  class="form-control" id="degree_division" name="degree_division" placeholder="Enter Degree Division">
			    </div>
			</div>
			@endif



			@if($scp->job_id == "on")
			<div class="form-group">
			    <label for="job_id" class="col-sm-4 control-label">Designation</label>
			    <div class="col-sm-4">
			      	<?php $designations = Designations::all(); ?>
			    	<select class="form-control" id="job_id" name="job_id">
			    		<option selected="selected" value="">---Select Designation---</option>
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
			      	<input type="text"  class="form-control" id="jobs_place" name="jobs_place" placeholder="Enter Job Place">
			    </div>
			</div>
			@endif

			@if($scp->jobs_field == "on")
			<div class="form-group">
			    <label for="jobs_field" class="col-sm-4 control-label">Field Name</label>
			    <div class="col-sm-8">
			      	<input type="text"  class="form-control" id="jobs_field" name="jobs_field" placeholder="Enter Field Name">
			    </div>
			</div>
			@endif

			@if($scp->yoj == "on")
			<div class="form-group">
			    <label for="yoj" class="col-sm-4 control-label">Year of joining</label>
			    <div class="col-sm-3">
			      	<input type="number"  class="form-control" id="yoj" name="yoj" placeholder="Enter Year of Joining">
			    </div>
			</div>
			@endif

			@if($scp->status == "on")
			<div class="form-group">
			    <label for="status" class="col-sm-4 control-label">Status</label>
			    <div class="col-sm-3">
			    	<select class="form-control" name="status">
			    		<option selected="selected" value="">---Status---</option>
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
			      	<input type="text"  class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
			    </div>
			</div>
			@endif


			<div class="form-group">
			    <div class="col-sm-offset-4 col-sm-4">
			      	<button type="submit" class="btn btn-success">Save</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	
</div>
@endsection