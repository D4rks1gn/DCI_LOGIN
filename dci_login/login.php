<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/login.css">

	<!-- Bootstrap link -->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    
    <!-- Bootstrap Java Script -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

	<title>Log in</title>
</head>
<body>
	<?php 
		if(isset($_GET['message'])) {
		echo '
			<div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
				<h4>'.$_GET['message'].'</h4>
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			</div>
		';		
		}
	?>


	<div class="l-form">
		<form class="form" action="http:\\localhost\dci_login\dci_login.php" method="post">
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

			<input type="submit" value="Sign in" class="form-button">

			<div class="create-account mt-3">
				Don't Have an Account ?<a href="register.php"> Sign up</a>
			</div>

		</form>
	</div>
</body>
</html>

