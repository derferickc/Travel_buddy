<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Welcome!</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
			<li><a href="#"></a></li>
	        <li><a href="#"></a></li> 
	        <li><a href="#"></a></li> 
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class='container'>
		<div class='register'>
			<h4>Register</h4>
			<?= $this->session->flashdata('errors') ?>
			<?= $this->session->flashdata('success') ?>
			<form action='register' method='post'>
				<input type="hidden" name="registration" value="registration">
					<p>Name: <input type='text' name='name'></p>
					<p>Username: <input type='text' name='username'></p>
					<p>Password: <input type='password' name='password'></p>
					<p>*Password should be at least 8 characters</P>
					<p>Password Confirmation: <input type='password' name='confirm_password'></p>
					<p><input type='submit' class='btn btn-primary .btn-md' value="Register"></p>
			</form><br>
		</div>
		<div class='login'>
			<h4>Signin</h4>
			<form action='login' method='post'>
				<input type="hidden" name="login" value="login">
					<p>Username: <input type='text' name='username'></p>
					<p>Password: <input type='password' name='password'></p>
					<p></p><input type='submit' class='btn btn-primary .btn-md' value="Login">
			</form><br>
		</div>
	</div>
<body>

</body>
</html>