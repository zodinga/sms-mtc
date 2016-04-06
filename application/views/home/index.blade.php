@layout('home')
@section('content')
    <h1>About Missionary Training College</h1>
    <hr>
    <blockquote>
    MTC is an institution under the Synod Mission Board of the Mizoram Presbyterian Church for training committed Christians for missionary service. At the moment, Missionary Training College is providing different programmes such as Bachelor of Missiology (3 years course), Missionary Short Course (3 months), Refreshers Course for in-service missionaries (1 month), Orientation Course for Missionary Pastors (1 week). The vision of the college is the the fulfilment of Great Commission of Christ in the socio-economic, cultural and religious context of the contemporary world. This involves training committed men and women to become more effective missionaries and mission leaders in order to facilitate contemporary mission by responding to the calling of God.
    </blockquote>
    <?php 
        $courses = Courses::all();
        $students = Students::all();
        $totStudent = Students::count('id'); 
    ?>
    <h3> Total no of Student : {{$totStudent}}</h3>
    
    <div class="side-body padding-top">
        <div class="row">
            @foreach($courses as $course)
            <?php $totno = Students::where('course_id','=',$course->id)->count('id') ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="/home/studentExisting/{{$course->id}}">
                    <div class="card red summary-inline">
                        <div class="card-body">
                            <div class="icon">
                                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            </div>
                            <div class="content">
                                <div class="title">{{$totno ? $totno : "0"}}</div>
                                <div class="sub-title">{{$course->course}}</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
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
