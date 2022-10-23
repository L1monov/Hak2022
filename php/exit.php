<?php
	setcookie('auth', $user['id'], time() - 60*60*24, "/");
	setcookie('email', $user['email'], time() - 60*60*24, "/");

	header('Location: ../login.php');
?>