<?php
	session_start();

	if(isset($_COOKIE['logged'])) {

		setcookie('logged', "", time() - 900, "/");
		// setcookie($_COOKIE["user_power"], "", time() - 3600, "/");

		$sess = $_COOKIE['logged'];
		echo $sess;
		session_destroy();
	}
	else {
		echo "oops";
	}

	header('Location: ../pages/account.php');
	die();
?>