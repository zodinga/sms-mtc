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
        <h3>Gallery Items</h3>
        <h4>Total: {{Galleries::count()}}</h4>
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
        		</tr>
        		@endforeach
        	</tbody>
		</table>

		
    </div>

	
</div>
@endsection