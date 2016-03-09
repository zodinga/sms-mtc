@layout('login')
@section('content')
	<form class="form-signin" action="/login" method="POST">
        <h2 class="form-signin-heading">Please Login: <br />SMS MTC</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <button class="btn btn-lg btn-success btn-block" onclick="location.href='/'">Back to home</button>
    </form>
@endsection