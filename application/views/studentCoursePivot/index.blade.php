@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Student Entry Field Selector successfully updated...</div>
	@endif
	
    <div class="col-md-12">

        <h3>Student Entry Column Selector</h3>
        <hr>
        <form class="form-horizontal" action="/student_course_pivot/fieldSave" method="POST">
			<table class="table table-hover">
				<thead>
					<tr>
						<td>Column</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>{{$course->course}}</td>
						@endforeach
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Photo</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox" name="photo">
							  	<label>
							    	<input type="checkbox" name="photo{{$course->id}}" <?php if ($scp->photo == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>
					<tr>
						<td>Name</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="name{{$course->id}}"  <?php if ($scp->name == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>
					<tr>
						<td>Father's Name</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="fname{{$course->id}}"  <?php if ($scp->fname == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Date of Birth</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="dob{{$course->id}}"  <?php if ($scp->dob == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Place of Birth</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="pob{{$course->id}}"  <?php if ($scp->pob == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Gender</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="gender{{$course->id}}" <?php if ($scp->gender == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Nationality</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="nationality{{$course->id}}" <?php if ($scp->nationality == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Contact No</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="contact_no{{$course->id}}" <?php if ($scp->contact_no == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Local Church Address</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="local_church_address{{$course->id}}" <?php if ($scp->local_church_address == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Street</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="street{{$course->id}}" <?php if ($scp->street == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Town</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="town{{$course->id}}" <?php if ($scp->town == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>District</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="district{{$course->id}}" <?php if ($scp->district == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>State</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="state{{$course->id}}" <?php if ($scp->state == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Pin</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="pin{{$course->id}}" <?php if ($scp->pin == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Present Street</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="pstreet{{$course->id}}" <?php if ($scp->pstreet == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Present town</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ptown{{$course->id}}" <?php if ($scp->ptown == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Present District</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="pdistrict{{$course->id}}" <?php if ($scp->pdistrict == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Present State</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="pstate{{$course->id}}" <?php if ($scp->pstate == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Present Pin</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ppin{{$course->id}}" <?php if ($scp->ppin == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Guardian name</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="guardian_name{{$course->id}}" <?php if ($scp->guardian_name == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Guardian Address</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="guardian_address{{$course->id}}" <?php if ($scp->guardian_address == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Year of Admission</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="yoa{{$course->id}}" <?php if ($scp->yoa == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Batch</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="batch{{$course->id}}" <?php if ($scp->batch == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 10 Board</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ten_board{{$course->id}}" <?php if ($scp->ten_board == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 10 year of passing</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ten_year{{$course->id}}" <?php if ($scp->ten_year == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 10 Degree</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ten_degree{{$course->id}}" <?php if ($scp->ten_degree == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 10 Degree</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ten_degree{{$course->id}}" <?php if ($scp->ten_degree == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 10 Division</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="ten_division{{$course->id}}" <?php if ($scp->ten_division == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 12 Board</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="twelve_board{{$course->id}}" <?php if ($scp->twelve_board == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 12 Year</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="twelve_year{{$course->id}}" <?php if ($scp->twelve_year == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>


					<tr>
						<td>Class 12 Degree</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="twelve_degree{{$course->id}}" <?php if ($scp->twelve_degree == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Class 12 Division</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="twelve_division{{$course->id}}" <?php if ($scp->twelve_division == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Degree Board</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="degree_board{{$course->id}}" <?php if ($scp->degree_board == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Degree Year</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="degree_year{{$course->id}}" <?php if ($scp->degree_year == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Degree</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="degree_degree{{$course->id}}" <?php if ($scp->degree_degree == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Degree Division</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="degree_division{{$course->id}}" <?php if ($scp->degree_division == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Designation</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="job_id{{$course->id}}" <?php if ($scp->job_id == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Job Place</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="jobs_place{{$course->id}}" <?php if ($scp->jobs_place == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Job Field</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="jobs_field{{$course->id}}" <?php if ($scp->jobs_field == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>Year of Joining</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="yoj{{$course->id}}" <?php if ($scp->yoj == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>

					<tr>
						<td>remarks</td>
						<?php $courses = Courses::all(); ?>
						@foreach($courses as $course)
						<td>
							<?php $scp = StudentCoursePivots::where('course_id','=',$course->id)->first(); ?>
							@if($scp)
							<div class="checkbox">
							  	<label>
							    	<input type="checkbox" name="remarks{{$course->id}}" <?php if ($scp->remarks == "on") echo "checked"; ?>>
							  	</label>
							</div>
							@endif
						</td>
						@endforeach
					</tr>
				</tbody>

			</table>
			
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      	<button type="submit" class="btn btn-success">Save</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>
</div>
@endsection