@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Student Result successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Student Result Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Student Result Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Student Result successfully added...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Student Result successfully Updated...</div>
	@endif

    <div class="col-md-12">
    	<?php $course = Courses::find($course_id); 
    		dd($course);
    	?>
        <h3>Search Student for Result Entry : {{$course->course}}</h3>
        <hr>
        <form class="form-inline" method="POST" action="/result/search">
            <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Student Name">
            </div>
            or
            <div class="input-group">
                <input type="number"  class="form-control" name="yoa" placeholder="Year of Admission">
            </div>
            or	
            <div class="input-group">
                <input type="text" class="form-control" name="internal_registration" placeholder="Enter Internal Registration">
            </div>
            or	
            <div class="input-group">
                <input type="number" class="form-control" name="contact" placeholder="Enter Contact No">
            </div>
            or	
            <div class="input-group">
                <input type="number" class="form-control" name="batch" placeholder="Enter Batch No">
            </div>
            
            <div class="input-group">
            	<input type="hidden" name="course_id" value="{{$course_id}}">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
            </div>
        </form>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
        			<td><strong>Name</strong></td>
        			<td><strong>Internal Registration</strong></td>
        			<td><strong>Year of Admission</strong></td>
        			<td><strong>Batch</strong></td>
        			<td><strong>Gender</strong></td>
        			<td><strong>Contact</strong></td>
        			<td><strong>Action</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($students->results as $student)
        		<tr>
        			<td>{{$student->id}}</td>
        			<td>{{$student->name}}</td>
        			<td>{{$student->internal_registration}}</td>
        			<td>{{$student->yoa ? $student->yoa : '-'}}</td>
        			<td>{{$student->batch ? $student->batch : '-'}}</td>
        			<td>{{$student->gender ? $student->gender : '-'}}</td>
        			<td>{{$student->contact_no ? $student->contact_no : '-'}}</td>
        			<td>
        				<button type="button" class="btn btn-success" onclick="location.href='/result/resultCreate/{{$student->id}}'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update Result</button>
        				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$student->id}}"><span class="glyphicon glyphicon-list" aria-hidden="true" ></span> View Details</button>
        				<div class="modal fade" id="myModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">STUDENT RESULT DETAILS </h4>
							      	</div>
							      	<div class="modal-body">
							      	<table class="table table-hover">
							        	<tr>
										    <td>COURSE</td>
										    <td>{{$course->course}}</td>
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

										@if($scp->internal_registration == "on")
										<tr>
										    <td>Internal Registration No</td>
										    <td>{{$student->internal_registration}}</td>
										</tr>
										@endif

										@if($scp->university_registration == "on")
										<tr>
										    <td>University Registration No</td>
										    <td>{{$student->university_registration}}</td>
										</tr>
										@endif

										@if($scp->gender == "on")
										<tr>
										    <td>Gender</td>
										    <td>{{$student->gender}}</td>
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


										@if($scp->status == "on")
										<tr>
										    <td>Status</td>
										    <td>{{$student->status}}</td>
										</tr>
										@endif

										@if($scp->remarks == "on")
										<tr>
										    <td>Remarks</td>
										    <td>{{$student->remarks}}</td>
										</tr>
										@endif
										<tr>
										    <td><strong>Subject/Paper</strong></td>
										    <td><strong>Mark Scored</strong></td>
										</tr>
										<?php 
											$results = Results::where('s_id','=',$student->id)->get();
											if($results)
												{	
													foreach ($results as $result) {
														$subject = Subjects::find($result->subj_id);
														echo "<tr>";
														echo "<td>".$subject->subject." : FM (".$subject->fullmark.") PM(".$subject->passmark.")</td><td>".$result->marks_scored."</td>"; 
														echo "</tr>";
													}
												} 
										?>
										
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