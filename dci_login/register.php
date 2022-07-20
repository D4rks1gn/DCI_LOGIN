<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/register.css">
	<title>Register</title>
</head>
<body>
	<div class="l-form">
		<form class="form" action="http:\\localhost\dci_login\dci_login.php" method="post">
			<input type="hidden" name="action" value="register">
			<h1 class="form-title">Register</h1>

			<div class="form-div">
				<input type="text" class="form-input" id="username" name="username" placeholder=" " required>
				<label for="" class="form-lable">Username</label>
			</div>

			<div class="form-div">
				<input type="email" class="form-input" id="email" name="email" placeholder=" " required>
				<label for="" class="form-lable">Email id</label>
			</div>

			<div class="form-div">
				<input type="password" class="form-input" id="password" name="password" placeholder=" " required>
				<label for="" class="form-lable">Password</label>
			</div>

			<div class="create-account">
				Already Have an Account ?<a href="login.php"> Sign in</a>
			</div>

			<input type="submit" value="Register" class="form-button">

		</form>
	</div>
</body>
</html>
