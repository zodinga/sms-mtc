<?php $courses=Courses::all(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Dashboard : Student Management System (MTC)</title>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="../../bootstrap/css/dashboard.css" rel="stylesheet">
        <script src="../../bootstrap/js/ie-emulation-modes-warning.js"></script>

       
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Student Management System : Missionary Training College</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Welcome : {{Auth::user()->username}}</a></li>
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/dashboard"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/account/accountCreate"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create/Edit User</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> System Config <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/course/courseCreate"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
                                <li><a href="/designation/designationCreate"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Designation</a></li>
                                <li><a href="/subject/subjectCreate"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Subject/Paper</a></li>
                                <li><a href="/student_course_pivot"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Entry Column Selector</a></li>
                                <li><a href="/gallery/itemCreate"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Student Entry <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($courses as $course)
                                <li><a href="/student/studentCreate/{{$course->id}}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Student ({{$course->course}})</a></li>
                                <li><a href="/student/studentExisting/{{$course->id}}"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Existing Student ({{$course->course}})</a></li>
                                <li role="separator" class="divider"></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Result Entry <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($courses as $course)
                                <li><a href="/result/resultStudent/{{$course->id}}"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> {{$course->course}}</a></li>
                                <li role="separator" class="divider"></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Staff Entry <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/staff/staffCreate"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Staff</a></li>
                                <li><a href="/staff/staffExisting"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>  Existing Staff</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Report <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Student</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Staff</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Result</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Mission Gallery <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/mission_gallery/itemCreate"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> New Item</a></li>
                                <li><a href="/mission_gallery/itemExisting"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Existing Items</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Book Purchased/Received<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/book_purchased_received/bookCreate"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> New Book</a></li>
                                <li><a href="/book_purchased_received/bookExisting"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Existing Books</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>
                    </ul>
                    <!--
                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Student/Staff...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
                            </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> System</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>
                    </ul>
                    -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>

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
