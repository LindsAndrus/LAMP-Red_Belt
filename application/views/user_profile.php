<html>
<head>
	<title>User Profile</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<a href="/friends">Home</a>
			<a href="/destroy">Logout</a>
		</div>
		<div class="jumbotron">
			<?php foreach($user as $person){?>
			<h2><?= $person['alias']?>'s Profile</h2>
			<p>Name: <?= $person['name'] ?></p>
			<p>Email: <?= $person['email'] ?></p>
			<?php } ?>
		</div>
	</div>
</body>
</html>