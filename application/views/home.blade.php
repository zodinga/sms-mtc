<?php $courses = Courses::all();?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Management System: Missionary Traning College</title>
<meta name="description" content="Missionary Training College.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../bootstrap/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="../../bootstrap/css/bootstrap-image-gallery.css">
<link rel="stylesheet" href="../../bootstrap/css/demo.css">
<link rel="stylesheet" href="../../bootstrap/css/flat-blue.css">
<link rel="stylesheet" href="../../bootstrap/css/style.min.css">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Student Management System: Missionary Traning College</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($courses as $course)
                        <li><a href="/home/studentExisting/{{$course->id}}"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Existing Student ({{$course->course}})</a></li>
                        <li role="separator" class="divider"></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="/login_form"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    @yield('content')
</div>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../bootstrap/js/jquery.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation and button states -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/js/jquery.blueimp-gallery.min.js"></script>
<script src="../../bootstrap/js/bootstrap-image-gallery.js"></script>
<script src="../../bootstrap/js/demo.js"></script>
</body>
</html>
