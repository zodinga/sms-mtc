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
        <h3>Search Result</h3>
        <hr>
         <form class="form-inline" method="POST" action="/mission_gallery/search">
            <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
            </div>
            or
            <div class="input-group">
                <input type="text"  class="form-control" name="author_editors" placeholder="Enter Author/Editor">
            </div>
            or  
            <div class="input-group">
                <input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" placeholder="Enter Date of Purchase">
            </div>
            or  
            <div class="input-group">
                <input type="text" class="form-control" name="source" placeholder="Enter Source">
            </div>
                       
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
            </div>
        </form>
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
        			<td>
        				<button type="button" class="btn btn-success" onclick="location.href='/mission_gallery/itemEdit/{{$gallery->id}}'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
        				<button type="button" class="btn btn-danger" onclick="location.href='/mission_gallery/itemDelete/{{$gallery->id}}'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
        				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$gallery->id}}"><span class="glyphicon glyphicon-list" aria-hidden="true" ></span> View Details</button>
        				<div class="modal fade" id="myModal{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">mission Details : </h4>
							      	</div>
							      	<div class="modal-body">
							      	<table class="table table-hover">
							        	
										<tr>
										    <td>Item Name</td>
										    <td>{{$gallery->item_name}}</td>
										</tr>

										<tr>
										    <td>Description</td>
										    <td>{{$gallery->description}}</td>
										</tr>

										<tr>
										    <td>Quantity</td>
										    <td>{{$gallery->quantity}}</td>
										</tr>

										<tr>
										    <td>Source</td>
										    <td>{{$gallery->source}}</td>
										</tr>

										<tr>
										    <td>Date of Registration</td>
										    <?php $date=date_create($gallery->date_of_registration); ?>
											<td>{{date_format($date,"d/M/Y")}}</td>
										</tr>

										<tr>
										    <td>Remarks</td>
										    <td>{{$gallery->remarks}}</td>
										</tr>
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
		
    </div>

	
</div>
@endsection