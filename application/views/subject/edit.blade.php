@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Subject/Paper successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Subject/Paper Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Subject/Paper Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Subject/Paper successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Subject/Paper successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>Edit Subject/Paper</h3>
        <hr>
        <form class="form-horizontal" action="/subject/subjectUpdate" method="POST">
			<div class="form-group">
			    <label for="course_id" class="col-sm-2 control-label">Course</label>
			    <div class="col-sm-10">
			      	<select class="form-control" name="course_id" required title="Course Required">
			      	<option selected="selected" value="{{$subject->course_id}}">{{$subject_name->course}}</option>
			      	@foreach($courses as $course)
			      		<option value="{{$course->id}}">{{$course->course}}</option>
			      	@endforeach
					</select>
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="subject" class="col-sm-2 control-label">Subject/Paper Name</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="subject" id="subject" value="{{$subject->subject}}" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="syllabus_start_date" class="col-sm-2 control-label">Syllabus Start Date</label>
			    <div class="col-sm-10">
			    <?php 
			    	$time = strtotime($subject->syllabus_start_date);

					$newformat = date('Y-m-d',$time);

		    	?>
			      	<input type="date" class="form-control" name="syllabus_start_date" id="syllabus_start_date" value="{{$newformat}}">
			    	
			    </div>
			</div>

			<div class="form-group">
			    <label for="code" class="col-sm-2 control-label">Subject Code</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="code" id="code" value="{{$subject->code}}" >
			    </div>
			</div>

			<div class="form-group">
			    <label for="fullmark" class="col-sm-2 control-label">Full Mark</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="fullmark" id="fullmark" value="{{$subject->fullmark}}">
			    </div>
			</div>

			<div class="form-group">
			    <label for="passmark" class="col-sm-2 control-label">Pass Mark</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" name="passmark" id="passmark" value="{{$subject->passmark}}">
			    </div>
			</div>


			
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input type="hidden" name="id" value="{{$subject->id}}">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing subjects</h3>
		<hr>
		<?php $courses  = Courses::all(); ?>
		@foreach($courses as $course)
			<table class="table table-hover">
			<strong>Course : {{$course->course}}</strong>
			<hr>
			<?php $subjects  = Subjects::where('course_id','=',$course->id)->get(); ?>
				<thead>
					<tr>
						<td>#</td>
						<td>Subject Code</td>
						<td>Subject Name</td>
						<td>FM</td>
						<td>PM</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach($subjects as $subject)
					<tr>
						<td>{{$subject->id}}</td>
						<td>{{$subject->code}}</td>
						<td>{{$subject->subject}}</td>
						<td>{{$subject->fullmark}}</td>
						<td>{{$subject->passmark}}</td>
						<td>
							<button type="button" onclick="location.href='/subject/subjectEdit/{{$subject->id}}'" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
							<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$subject->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
							<!-- Modal -->
							<div class="modal fade" id="myModal{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  	<div class="modal-dialog" role="document">
							    	<div class="modal-content">
									    <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
									    </div>
										<div class="modal-body">
								        Are You Sure to Delete Subject ID : {{$subject->id}}
								      	</div>
								      	<div class="modal-footer">
									        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
									        <button type="button" onclick="location.href='/subject/subjectDelete/<?php echo $subject->id ? $subject->id : '-';?>'" class="btn btn-danger">Delete</button>
								      	</div>
							    	</div>
							  	</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endforeach
					
	</div>
</div>
@endsection