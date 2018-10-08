<?php 
require 'class/db.php';
require 'class/user.php';
$user = new User();
if(!empty($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user->login($username, $password);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PRIJAVITE SE</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="icon/logo.ico"/>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
	<div id="loginForm">
		<div id="loginheader">
			<h4>Prijavite se</h4>
		</div>
		<div id="restoflogin">
			<form method="post">
				<input type="text" name="username" placeholder="" autocomplete="off">
				<input type="password" name="password" placeholder="" autocomplete="off">
				<input type="submit" value="Prijavite se">
			</form>
		</div>
	</div>
</body>
</html>