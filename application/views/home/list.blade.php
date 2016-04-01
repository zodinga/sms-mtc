@layout('home')
@section('content-1')
@endsection
@section('content-2')
<div class="row" style="margin-top:70px;">
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
		<div class="alert alert-success" role="alert">One Student successfully Added...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Student successfully Updated...</div>
	@endif

    <div class="col-md-12">
    	<p></p>
    	<?php $course = Courses::find($course_id); ?>
        <h3>Existing Student of {{$course->course}}</h3>
        <hr>
        <form class="form-horizontal" method="POST" action="/home/search">
            <div class="input-group">
            	<div class="col-sm-2">
                	<input type="text" class="form-control" name="name" placeholder="Enter Student Name">
            	</div>
	            
	            <div class="col-sm-2">
	                <input type="number"  class="form-control" name="yoa" placeholder="Year of Admission">
	            </div>
	            
	            <div class="col-sm-2">
	                <input type="number" class="form-control" name="batch" placeholder="Enter Batch No">
	            </div>
	            
	            <div class="col-sm-2">
	                <input type="number" class="form-control" name="contact_no" placeholder="Enter Contact No">
	            </div>
	            
	            <div class="col-sm-2">
	                <input type="text" class="form-control" name="Town" placeholder="Enter City">
	            </div>
            
	           	<div class="col-sm-2">
	            	<input type="hidden" name="course_id" value="{{$course_id}}">
	                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
	            </div>
	        </div>
        </form>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
        			<td><strong>Name</strong></td>
        			<td><strong>Father's Name</strong></td>
        			<td><strong>Place of Birth</strong></td>
        			<td><strong>Year of Admission</strong></td>
        			<td><strong>Batch</strong></td>
        			<td><strong>Gender</strong></td>
        			<td><strong>Contact</strong></td>
        			<td><strong>Street</strong></td>
        			<td><strong>City</strong></td>
        			<td><strong>Action</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($students->results as $student)
        		<tr>
        			<td>{{$student->id}}</td>
        			<td>{{$student->name}}</td>
        			<td>{{$student->fname ? $student->fname : '-'}}</td>
        			<td>{{$student->pob ? $student->pob : '-'}}</td>
        			<td>{{$student->yoa ? $student->yoa : '-'}}</td>
        			<td>{{$student->batch ? $student->batch : '-'}}</td>
        			<td>{{$student->gender ? $student->gender : '-'}}</td>
        			<td>{{$student->contact_no ? $student->contact_no : '-'}}</td>
        			<td>{{$student->street ? $student->street : '-'}}</td>
        			<td>{{$student->city ? $student->city : '-'}}</td>
        			<td>
        				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$student->id}}"><span class="glyphicon glyphicon-list" aria-hidden="true" ></span> View Details</button>
        				<div class="modal fade" id="myModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">STUDENT DETAILS : </h4>
							      	</div>
							      	<div class="modal-body">
							      	<table class="table table-condensed">
							        	<tr>
										    <td><b>COURSE</b></td>
										    <td><b>{{$course->course}}</b></td>
										</tr>
							        	@if($scp->name == "on")
										<tr>
										    <td>Student Name</td>
										    <td>{{$student->name}}</td>
										</tr>
										@endif

										@if($scp->fname == "on")
										<tr>
										    <td>Father's Name</td>
										    <td>{{$student->fname}}</td>
										</tr>
										@endif

										@if($scp->pob == "on")
										<tr>
										    <td>Place of Birth</td>
										    <td>{{$student->pob}}</td>
										</tr>
										@endif


										@if($scp->gender == "on")
										<tr>
										    <td>Gender</td>
										    <td>{{$student->gender}}</td>
										</tr>
										@endif
										
										@if($scp->nationality == "on")
										<tr>
										    <td>Nationality</td>
										    <td>{{$student->nationality}}</td>
										</tr>
										@endif

										@if($scp->contact_no == "on")
										<tr>
										    <td>Contact no</td>
										    <td>{{$student->contact_no}}</td>
										</tr>
										@endif

										@if($scp->local_church_address == "on")
										<tr>
										    <td>Local Church Address</td>
										    <td>{{$student->local_church_address}}</td>
										</tr>
										@endif

										@if($scp->street == "on")
										<tr>
										    <td>Street</td>
										    <td>{{$student->street}}</td>
										</tr>
										@endif

										@if($scp->town == "on")
										<tr>
										    <td>Town</td>
										    <td>{{$student->town}}</td>
										</tr>
										@endif

										@if($scp->district == "on")
										<tr>
										    <td>District</td>
										    <td>{{$student->district}}</td>
										</tr>
										@endif

										@if($scp->state == "on")
										<tr>
										    <td>State</td>
										    <td>{{$student->state}}</td>
										</tr>
										@endif

										@if($scp->pin == "on")
										<tr>
										    <td>PIN Code</td>
										    <td>{{$student->pin}}</td>
										</tr>
										@endif

										@if($scp->pstreet == "on")
										<tr>
										    <td>Present Street</td>
										    <td>{{$student->pstreet}}</td>
										</tr>
										@endif

										@if($scp->ptown == "on")
										<tr>
										    <td>Present Town</td>
										    <td>{{$student->ptown}}</td>
										</tr>
										@endif

										@if($scp->pdistrict == "on")
										<tr>
										    <td>Present District</td>
										    <td>{{$student->pdistrict}}</td>
										</tr>
										@endif

										@if($scp->pstate == "on")
										<tr>
										    <td>Present State</td>
										    <td>{{$student->pstate}}</td>
										</tr>
										@endif

										@if($scp->ppin == "on")
										<tr>
										    <td>Present PIN Code</td>
										    <td>{{$student->ppin}}</td>
										</tr>
										@endif

										@if($scp->guardian_name == "on")
										<tr>
										    <td>Guardian Name</td>
										    <td>{{$student->guardian_name}}</td>
										</tr>
										@endif

										@if($scp->guardian_address == "on")
										<tr>
										    <td>Guardian Address</td>
										    <td>{{$student->guardian_address}}</td>
										</tr>
										@endif

										@if($scp->yoa == "on")
										<tr>
										    <td>Year of Admission</td>
										    <td>{{$student->yoa}}</td>
										</tr>
										@endif

										@if($scp->batch == "on")
										<tr>
										    <td>Batch</td>
										    <td>{{$student->batch}}</td>
										</tr>
										@endif

										@if($scp->job_id == "on")
										<tr>
										    <td>Designation</td>
										    <td><?php $designation = Designations::find($student->job_id); ?>{{$designation->designation}}</td>
										</tr>
										@endif

										@if($scp->jobs_place == "on")
										<tr>
										    <td>Job Place</td>
										    <td>{{$student->job_place}}</td>
										</tr>
										@endif

										@if($scp->jobs_field == "on")
										<tr>
										    <td>Field Name</td>
										    <td>{{$student->jobs_field}}</td>
										</tr>
										@endif

										@if($scp->yoj == "on")
										<tr>
										    <td>Year of joining</td>
										    <td>{{$student->yoj}}</td>
										</tr>
										@endif

										@if($scp->remarks == "on")
										<tr>
										    <td>Remarks</td>
										    <td>{{$student->remarks}}</td>
										</tr>
										@endif
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

		<div class="pagination">
		{{$students->links()}}
		</div>
    </div>

	
</div>
@endsection