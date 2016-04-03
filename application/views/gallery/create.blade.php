@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
		<div class="alert alert-success" role="alert">Gallery Item successfully deleted...</div>
	@endif
	@if($conf == 2)
		<div class="alert alert-danger" role="alert">Delete Error: Gallery Item Cannot Delete...</div>
	@endif
	@if($conf == 3)
		<div class="alert alert-warning" role="alert">Save Error: Gallery Item Cannot Save...</div>
	@endif
	@if($conf == 4)
		<div class="alert alert-success" role="alert">One Gallery Item successfully created...</div>
	@endif
	@if($conf == 5)
		<div class="alert alert-success" role="alert">One Gallery Item successfully Updated...</div>
	@endif
    <div class="col-md-6">

        <h3>New Item</h3>
            
        <hr>
        <form class="form-horizontal" action="/gallery/itemSave" method="POST" enctype="multipart/form-data">

        	<div class="form-group">
			    <label for="photo" class="col-sm-2 control-label">Photo</label>
			    <div class="col-sm-10">
					<script>
						function img_pathUrl(input){
						   $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
						}
					</script>
					<img src="img_url" onerror="this.src='/image/default1.png';"id="img" alt="Upload your image" width="45%" height="45%" class="img-rounded" style="border:1px solid black">
			      	<input type="file" class="form-control" id="photo1" name="photo1" placeholder="Choose a photo to upload" onChange="img_pathUrl(this);">

			    </div>
			</div>

			<div class="form-group">
			    <label for="title" class="col-sm-2 control-label">Title</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required title="Title Required">
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
		<h3>Existing Items : {{Galleries::count()}}</h3>
		<hr>
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Title</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($galleries as $gallery)
				<tr>
					<td>{{$gallery->id}}</td>
					<td>{{$gallery->title}}</td>
					<td>
						<button type="button" onclick="location.href='/gallery/itemEdit/{{$gallery->id}}'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
						<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$gallery->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						


						<!-- Modal -->
						<div class="modal fade" id="myModal{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
								    </div>
									<div class="modal-body">
							        Are You Sure to Delete : {{$gallery->title}}
							        <?php 
				                        $pic="/image/gallery/".$gallery->photo;
				                        if($gallery->photo=="")
				                            $pic="/image/default1.png";
			                    	?>    
									<img src="img_url" onerror="this.src='{{$pic}}';"id="img" alt="Upload your image" width="10%" height="10%" class="img-rounded" style="border:1px solid black">
							      	</div>
							      	<div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								        <button type="button" onclick="location.href='/gallery/itemDelete/<?php echo $gallery->id ? $gallery->id : '-';?>'" class="btn btn-danger">Delete</button>
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


<!--Upload
            <div class="btn-group pull-right">
    			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#upload_modal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Upload Photo</button>
			</div>
					
						<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">

								<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        		<h3>Upload a new Photo</h3>
								    </div>
									<div class="modal-body">
								        <form method="POST" action="{{ URL::to('gallery/upload') }}" id="upload_modal_form" enctype="multipart/form-data">

								        <script>
										function img_pathUrl(input){
										   $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
										}
										</script>

										<img src="img_url" id="img_url" alt="your image" width="50%" height="50%">

										    <label for="photo">Photo</label>
    										<input type="file" placeholder="Choose a photo to upload" name="photo" id="photo" onChange="img_pathUrl(this);"/>

								        </form>
							      	</div>
							      	<div class="modal-footer">
								        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
							        	<button type="button" onclick="$('#upload_modal_form').submit();" class="btn btn-primary">Upload Photo</button>
							      	</div>
						    	</div>
						    </div>
						  </div>
						
			End Upload-->

@endsection