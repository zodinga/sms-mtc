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
        <a href="/image/gallery/g1.jpg" title="g1" data-gallery>
        <img src="/image/gallery/g1.jpg" alt="g1" height="80.5" width="80.5">
        </a>
        <a href="/image/gallery/g2.jpg" title="g2" data-gallery>
            <img src="/image/gallery/g2.jpg" alt="g2" height="80.5" width="80.5">
        </a>
        <a href="/image/gallery/g3.jpg" title="g3" data-gallery>
            <img src="/image/gallery/g3.jpg" alt="g3" height="80.5" width="80.5">
        </a>
    </div>
    <hr>
@endsection
