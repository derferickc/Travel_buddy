<!DOCTYPE html>
<html>
<head>
	<title>Travel Dashboard</title>
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
	        <li><a href='/logout'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class='container'>
		<div class='register'>
			<h3>Welcome,  <?= $user['name'] ?>!</h3><br>
			<h4>Your Trip Schedules</h4>
			<table class="table table-condensed">
			  <tr>
			    <th>Destination</th>
			    <th>Travel Start Date</th> 
			    <th>Travel End Date</th>
			    <th>Plan</th>
			  </tr>
<?php
	foreach($my_tripinfo as $mytripinfo)
	{
?>
 			<tr>
				<td><a href="/destination/<?=$mytripinfo['id'] ?>"><?= $mytripinfo['destination'] ?></a></td>
				<td><?= $mytripinfo['travel_from'] ?></td>
				<td><?= $mytripinfo['travel_to'] ?></td>
				<td><?= $mytripinfo['description'] ?></td>
			</tr>
<?php
	}
?> 
			</table><br>

		</div>

		
		<div class='login'>
			<h4>Other User's Travel Plans</h4>
			<table class="table table-condensed">
			<tr>
			    <th>Name</th>
			    <th>Destination</th> 
			    <th>Travel Start Date</th>
			    <th>Travel End Date</th>
			    <th>Do You Want to Join?</th>
			  </tr>
<?php
	foreach($all_tripinfo as $all_trip)
	{
?>
			<tr>
				<td><?= $all_trip['name'] ?>
				<td><a href="/destination/<?= $all_trip['id'] ?>"><?= $all_trip['destination'] ?></a></td>
				<td><?= $all_trip['travel_from'] ?></td>
				<td><?= $all_trip['travel_to'] ?></td>
				<td><a href="/join/<?= $all_trip['id'] ?>">Join</a></td>
			</tr>
<?php
	}
?>
			</table>
		</div>
		<a href='/add'>Add Travel Plan</a>
	</div>
</body>
</html>