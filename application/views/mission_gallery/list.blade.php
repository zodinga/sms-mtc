@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
        <div class="alert alert-success" role="alert">Mission Gallery Item successfully deleted...</div>
    @endif
    @if($conf == 2)
        <div class="alert alert-danger" role="alert">Delete Error: Mission Gallery Item Cannot Delete...</div>
    @endif
    @if($conf == 3)
        <div class="alert alert-warning" role="alert">Save Error: Mission Gallery Item Cannot Save...</div>
    @endif
    @if($conf == 4)
        <div class="alert alert-success" role="alert">One Mission Gallery Item successfully created...</div>
    @endif
    @if($conf == 5)
        <div class="alert alert-success" role="alert">One Mission Gallery Item successfully Updated...</div>
    @endif

    <div class="col-md-12">
        <h3>Mission Gallery Items</h3>
        <h4>Total: {{Missiongalleries::count()}}</h4>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
        			<td><strong>Item Name</strong></td>
        			<td><strong>Description</strong></td>
        			<td><strong>Quantity</strong></td>
        			<td><strong>Source</strong></td>
        			<td><strong>Date of Registration</strong></td>
        			<td><strong>Remarks</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($galleries as $gallery)
        		<tr>
        			<td>{{$gallery->id}}</td>
        			<td>{{$gallery->item_name}}</td>
        			<td>{{$gallery->description ? $gallery->description : '-'}}</td>
        			<td>{{$gallery->quantity ? $gallery->quantity : '-'}}</td>
        			<td>{{$gallery->source ? $gallery->source : '-'}}</td>
        			<?php $dor=date_create($gallery->date_of_registration); ?>
					<td>{{date_format($dor,"d/m/Y")}}</td>
        			<td>{{$gallery->remarks ? $gallery->remarks : '-'}}</td>
        		</tr>
        		@endforeach
        	</tbody>
		</table>

		
    </div>

	
</div>
@endsection