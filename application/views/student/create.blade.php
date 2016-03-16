@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Course successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Course Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Course Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Course successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Course successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>New Student</h3>
        <hr>
        <form class="form-horizontal" action="/course/courseSave" method="POST">
			<div class="form-group">
			    <label for="coursename" class="col-sm-2 control-label">Course Name</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="coursename" name="coursename" placeholder="Enter Course name" required title="Course name Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="shortname" class="col-sm-2 control-label">Short Name</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="shortname" name="shortname" placeholder="Enter Course Short name" required title="Course short name Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="duration" class="col-sm-2 control-label">Duration</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="duration" id="duration" placeholder="Enter Course Duration" required title="Duration Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="noSubject" class="col-sm-2 control-label">No of Subject</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="noSubject" id="noSubject" placeholder="Enter Course no of subject" required title="No of Subject Required">
			    </div>
			</div>

			<div class="form-group">
			    <label for="remarks" class="col-sm-2 control-label">Remarks</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter remarks" >
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
		<h3>Existing Courses</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Course Name</td>
					<td>Duration</td>
					<td>No.of Subj</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($courses as $course)
				<tr>
					<td>{{$course->id}}</td>
					<td>{{$course->course}}</td>
					<td>{{$course->duration}}</td>
					<td>{{$course->no_of_subjs}}</td>
					<td>
						<button type="button" onclick="location.href='/course/courseEdit/{{$course->id}}'" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
						<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$course->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								    </div>
									<div class="modal-body">
							        Are You Sure to Delete Course ID : {{$course->id}}
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								        <button type="button" onclick="location.href='/course/courseDelete/<?php echo $course->id ? $course->id : '-';?>'" class="btn btn-danger">Delete</button>
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