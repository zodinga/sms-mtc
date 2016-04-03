@layout('home')
@section('content')
	<h1>About Missionary Training College</h1>
    <blockquote>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </blockquote>
    <form class="form-inline">
        
        <div class="form-group">
            <button id="image-gallery-button" type="button" class="btn btn-primary btn-lg">
                <i class="glyphicon glyphicon-picture"></i>
                Launch Image Gallery
            </button>
        </div>
    </form>
    <br>
    <!-- The container for the list of example images -->
    <div id="links">
    <?php
    $galleries=Galleries::all();
    ?>
    @foreach($galleries as $gallery)
        <a href="/image/gallery/<?php echo $gallery->photo; ?>" title="<?php echo $gallery->title; ?>" data-gallery>
        <img src="/image/gallery/<?php echo $gallery->photo; ?>" alt="<?php echo $gallery->title; ?>" height="80.5" width="80.5">
        </a>
    @endforeach
    </div>
    <hr>
@endsection
