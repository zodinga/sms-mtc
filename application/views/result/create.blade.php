@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Result successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Result Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Result Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Result successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Result successfully Updated...</div>
	@endif
    <div class="col-md-12">

        <h3>Update Result of {{$student->name}}, Internal Regn No: {{$student->internal_registration}}</h3>
        <hr>
        <form class="form-horizontal" action="/result/resultSave" method="POST">
			@foreach($subjects as $subject)
			<?php $result = Results::where('subj_id','=',$subject->id)->where('s_id','=',$student->id)->first();// var_dump($result); ?>
			<div class="form-group">
			    <label for="subject" class="col-sm-2 control-label">{{$subject->subject}}</label>
			    <div class="col-sm-2">
			      	<input type="hidden" name="subj_id{{$subject->id}}" value="{{$subject->id}}">
			      	<input type="hidden" name="student_id{{$subject->id}}" value="{{$student->id}}">
			      	<input type="number" class="form-control" name="mark{{$subject->id}}" value="{{$result ? $result->marks_scored : ''}}" id="mark{{$subject->subject_id}}" placeholder="Enter Mark Scored">
			    </div>
			</div>
			@endforeach

			
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input type="hidden" name="student_id" value="{{$student_id}}">
			      	<button type="submit" class="btn btn-success">Update</button>
			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

		
</div>
@endsection