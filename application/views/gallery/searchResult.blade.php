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

    <div class="col-md-12">
        <h3>Search Result</h3>
        <hr>
         <form class="form-inline" method="POST" action="/gallery/search">
            <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
            </div>
                       
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
            </div>
        </form>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
                    <td><strong>Photo</strong></td>
        			<td><strong>Title</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($galleries as $gallery)
        		<tr>
        			<td>{{$gallery->id}}</td>
                    <?php 
                    $pic="/image/gallery/".$gallery->photo;
                    if($gallery->photo=="")
                      $pic="/image/default1.gif";
                    ?>
                    <td>
                    <img src="<?php echo $pic;?>" height="40" width="40" alt="student-photo" class="img-rounded"></td>
        			<td>{{$gallery->title}}</td>
        			<td>
        				<button type="button" class="btn btn-success" onclick="location.href='/gallery/itemEdit/{{$gallery->id}}'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
        				<button type="button" class="btn btn-danger" onclick="location.href='/gallery/itemDelete/{{$gallery->id}}'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
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
                                            <td>Title</td>
                                            <td>{{$gallery->title}}</td>
                                        </tr>
                                        <tr>
										    <td>Photo</td>
										    <?php 
                                            $pic="/image/gallery/".$gallery->photo;
                                            if($gallery->photo=="")
                                              $pic="/image/default1.gif";
                                            ?>
                                            <td>
                                            <img src="<?php echo $pic;?>" height="40" width="40" alt="student-photo" class="img-rounded"></td>
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