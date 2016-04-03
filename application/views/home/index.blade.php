@layout('home')
@section('content')
	<h1>About Missionary Training College</h1>
    <hr>
    <blockquote>
    MTC is an institution under the Synod Mission Board of the Mizoram Presbyterian Church for training committed Christians for missionary service. At the moment, Missionary Training College is providing different programmes such as Bachelor of Missiology (3 years course), Missionary Short Course (3 months), Refreshers Course for in-service missionaries (1 month), Orientation Course for Missionary Pastors (1 week). The vision of the college is the the fulfilment of Great Commission of Christ in the socio-economic, cultural and religious context of the contemporary world. This involves training committed men and women to become more effective missionaries and mission leaders in order to facilitate contemporary mission by responding to the calling of God.
    </blockquote>
    <?php $totStudent = Students::count('id'); ?>
    <h3> Total no of Student : {{$totStudent}}</h3>
    @foreach($courses as $course)
        <?php $totno = Students::where('course_id','=',$course->id)->count('id') ?>
        <button class="btn btn-primary" type="button" onclick="location.href='/home/studentExisting/{{$course->id}}'">
            {{$course->course}} <span class="badge">{{$totno ? $totno : "0"}}</span>
        </button>
    @endforeach
    
    <hr>
    <form class="form-inline">
        
        <div class="form-group">
            <button id="image-gallery-button" type="button" class="btn btn-primary btn-lg">
                <i class="glyphicon glyphicon-picture"></i>
                Launch Main Gallery
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
