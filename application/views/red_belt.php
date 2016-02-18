<html>
<head>
	<title>Login/Registration</title>
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
		<div class="jumbotron">
			<h3>Welcome</h3>
			<p></p>
		<div class="login">
			<h2>Login</h2>
			<form action="/login" method="post">
				Email:<input type="text" name="member_email"><br></br>
				Password:<input type="password" name="member_password"><br></br>
				<input type="submit" value="Login"><br></br>
			</form>
		</div>
		<?php echo $errors; ?>
		<div id="reg">
			<h2>Register</h2>
			<form action="/registration" method="post">
				Name:<input type="text" name="first_name"><br></br>
				Alias:<input type="text" name="alias"><br></br>
				Email:<input type="text" name="email"><br></br>
				Password:<input type="password" name="password"><br></br>
				Confirm Password:<input type="password" name="confirm"><br></br>
				Date of Birth:<input type="date" name="dob"><br></br>
				<input type="submit" value="Register"><br></br>
			</form>
		</div>
		</div>
	</div>
</body>
</html>