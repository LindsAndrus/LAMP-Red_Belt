<html>
<head>
	<title>Friends</title>
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
			<a href="/destroy">Logout</a>
			<a href="/profile/1">My Profile</a>
		</div>
		<div class="jumbotron">
			<h2>Hello <?= $user['alias'] ?></h2>
			<p>Here is the list of your friends:</p>
			<table class="table">
				<th>Alias</th>
				<th>Action</th>
				<?php foreach ($allfriends as $person) {?>
					<tr>
						<?php if ($user['alias'] == $person['friend_name']) { ?>
							<td><?= $person['user_name'] ?></td>
						<?php } else 
						{ ?>
						<td><?= $person['friend_name'] ?></td>
						<?php } ?>
						<?php if ($user['alias'] == $person['friend_name']) { ?>
							<td><a href="/profile/<?= $person['user_id']?>">View Profile</a> <a href="/deletefriend/<?= $person['user_id']?>">Remove as Friend</a></td>
						<?php } else { ?>
							<td><a href="/profile/<?=$person['friend_id']?>">View Profile</a> <a href="/deletefriend/<?= $person['friend_id']?>">Remove as Friend</a></td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>

			<p>Other Users not on your friend's list:</p>
			<table class="table">
				<th>Alias</th>
				<th>Action</th>
				<?php foreach ($notapal as $notfriends) {?>
					<tr>
						<?php if ($notfriends['user_name'] == $person['user_name'] OR $notfriends['friend_name'] == $person['user_name'] OR $notfriends['friend_name'] == $person['friend_name']) {?>
							
						<?php } elseif ($notfriends['user_name'] == $person['user_name'] OR $notfriends['user_name'] == $person['friend_name']){ ?>
							<td><?= $notfriends['friend_name'] ?></td>
							<td><form action="/add/<?= $notfriends['friend_id']?>"><input type="submit" value="Add as Friend"></form></td>
						<?php } else { ?>
							<td><?= $notfriends['user_name'] ?></td>
							<td><form action="/add/<?= $notfriends['user_id']?>" method="post"><input type="submit" value="Add as Friend"></form></td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>