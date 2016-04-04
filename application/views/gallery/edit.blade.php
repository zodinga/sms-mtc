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
        <h3>Edit Item</h3>
        <hr>
        <form class="form-horizontal" action="/gallery/itemUpdate" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
			    <label for="photo" class="col-sm-2 control-label">Photo</label>
			    <div class="col-sm-10">
					<script>
						function img_pathUrl(input){
						   $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
						}
					</script>

					<?php 
                        $pic="/image/gallery/".$gallery->photo;
                        if($gallery->photo=="")
                            $pic="/image/default1.png";
                    ?>    
					<img src="img_url" onerror="this.src='{{$pic}}';"id="img" alt="Upload your image" width="75%" height="75%" class="img-rounded" style="border:1px solid black">
			      	<input type="file" class="form-control" id="photo1" name="photo1" placeholder="Choose a photo to upload" onChange="img_pathUrl(this);">
			      	
			    </div>
			</div>

			<div class="form-group">
			    <label for="title" class="col-sm-2 control-label">Title</label>
			    <div class="col-sm-10">
			      	<input type="text" class="form-control" id="title" name="title" value="{{$gallery->title}}" >
			    </div>
			</div>

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			    	<input type="hidden" value="{{$gallery->id}}" name="id">
			      	<button type="submit" class="btn btn-success">Update</button>

			      	<button type="button" onclick="location.href='/dashboard'" class="btn btn-primary">Exit</button>
			    </div>
			</div>
		</form>
    </div>

	<div class="col-md-6">
		<h3>Existing Items</h3>
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
						<!--End Modal -->
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
					
	</div>
</div>
@endsection