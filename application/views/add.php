<!DOCTYPE html>
<html>
<head>
	<title>Add Plan</title>
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
	      <a class="navbar-brand" href="#"></a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="/travels">Home</a></li>
	        <li><a href='/logout'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class='container'>
		<h4>Add a Trip</h4>
			<form action='/add_trip' method='post'>
				<p>Destination: <input type='text' name='destination'></p>
				<p>Description: <input type='text' name='description'></p>
				<p>Travel Date From: <input type='date' name='travel_from'></p>
				<p>Travel Date To: <input type='date' name='travel_to'></p>
				<p></p><input type='submit' class='btn btn-primary .btn-md' value="Add">
			</form><br>
	</div>
</body>
</html>