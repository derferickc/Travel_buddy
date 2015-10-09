<!DOCTYPE html>
<html>
<head>
	<title>Destination</title>
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
		<h3><?= $trips['destination'] ?></h3>
		<p>Planned By: <?= $trips['name'] ?></p>
		<p>Description: <?= $trips['description'] ?></p>
		<p>Travel Date From: <?= $trips['travel_from'] ?></p>
		<p>Travel Date To:<?= $trips['travel_to'] ?></p><br>

	<h4>Other users' joining the trip:</h4>
<?php
	foreach($tripzzz as $tripz)
	{
?>	
		<p><?= $tripz['name'] ?></p>
<?php
	}
?>
	</div>
</body>
</html>