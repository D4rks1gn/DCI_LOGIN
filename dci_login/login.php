<?php 
	if(isset($_GET['message'])) {
		echo '<h4 style="text-align:center; color:red; transition: 0.5s;">'.$_GET['message'].'</h4>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/login.css">
	<title>Log in</title>
</head>
<body>
	<div class="l-form">

		<form class="form" onsubmit="return errormsg()" action="http:\\localhost\dci_login\dci_login.php" method="post">
			<input type="hidden" name="action" value="signin">
			<h1 class="form-title">Sign In</h1>

			<span id="uname" hidden>Enter username</span>
			<div class="form-div">
				<input type="text" class="form-input" id="usernm" name="usernm" placeholder=" " required>
				<label for="" class="form-lable">Username</label>
			</div>

			<span id="pwd" hidden >Enter password</span>
			<div class="form-div">
				<input type="password" class="form-input" id="passwd" name="passwd" placeholder=" " required>
				<label for="" class="form-lable">Password</label>
			</div>

			<div class="create-account">
				Don't Have an Account ?<a href="register.php"> Sign up</a>
			</div>

			<input type="submit" value="Sign in" class="form-button">

		</form>
	</div>
</body>
</html>

