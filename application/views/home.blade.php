<?php $courses = Courses::all();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Student Management System : MTC</title>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <script src="../../bootstrap/js/ie-emulation-modes-warning.js"></script>
        <link href="../../bootstrap/css/carousel.css" rel="stylesheet">
    </head>
<body>
    <div class="navbar-wrapper">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/home">Student Management System : Missionary Training College</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                           
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Advanced Search <span class="caret"></span></a>
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
            </nav>
        </div>
    </div>

    @yield('content-1')

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        @yield('content-2')
        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="#"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span></a></p>
            <p>&copy; 2016 Missionary Training College, Mission Veng Aizawl. &middot;</p>
        </footer>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../bootstrap/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../bootstrap/js/jquery.min.js"><\/script>')</script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../bootstrap/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
