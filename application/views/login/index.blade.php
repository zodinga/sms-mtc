@layout('login')
@section('content')
	<form class="form-signin" action="/login" method="POST">
		<center>
			<img src="/image/logo-small.jpg">
	        <h2 class="form-signin-heading">Login: SMS MTC</h2>
        </center>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <button class="btn btn-lg btn-success btn-block" onclick="location.href='/home'">Back to home</button>
		<hr>
		@if($conf == 1)
			<div class="alert alert-danger" role="alert">Login Error: Password or Username mismatch</div>
		@endif
		@if($conf == 2)
			<div class="alert alert-danger" role="alert">Login Error: Cannot Login. Try again</div>
		@endif
    </form>
@endsection