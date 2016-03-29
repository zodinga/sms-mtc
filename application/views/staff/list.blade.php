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

    <div class="col-md-12">
        <h3>Existing Staffs: </h3><h4>Total: {{Staffs::count()}}</h4>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
        			<td><strong>Name</strong></td>
        			<td><strong>Fathers Name</strong></td>
        			<td><strong>Contact</strong></td>
        			<td><strong>Designation</strong></td>
        			<td><strong>Date of Joining</strong></td>
        			<td><strong>DoB</strong></td>
        			<td><strong>Gender</strong></td>
        			<td><strong>Address</strong></td>
        			<td><strong>Qualification</strong></td>
        			<td><strong>Remarks</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($staffs as $staff)
        		<tr>
        			<td>{{$staff->id}}</td>
        			<td>{{$staff->name}}</td>
        			<td>{{$staff->fname ? $staff->fname : '-'}}</td>
        			<td>{{$staff->contact_no ? $staff->contact_no : '-'}}</td>
                    <?php $desig = Designations::find($staff->desig);?>
        			<td>{{$desig->designation ? $desig->designation : '-'}}</td>
        			<?php $doj=date_create($staff->date_of_joining); ?>
					<td>{{date_format($doj,"d/m/Y")}}</td>
        			<?php $dob=date_create($staff->dob); ?>
					<td>{{date_format($dob,"d/m/Y")}}</td>
        			<td>{{$staff->gender ? $staff->gender : '-'}}</td>
        			<td>{{$staff->address ? $staff->address : '-'}}</td>
        			<td>{{$staff->qualification ? $staff->qualification : '-'}}</td>
        			<td>{{$staff->remarks ? $staff->remarks : '-'}}</td>
        		</tr>
        		@endforeach
        	</tbody>
		</table>

		
    </div>

	
</div>
@endsection