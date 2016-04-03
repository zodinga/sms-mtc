@layout('dashboard')
@section('content')
<div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h3 class="page-header">Dashboard : Administrator</h3>
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
        
        </div>
    </div>
</div>
@endsection