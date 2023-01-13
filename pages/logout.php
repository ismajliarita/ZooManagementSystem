<?php
	if(isset($_COOKIE['user_id'])) {
		session_start();

		setcookie('user_id', "a", time() - 600, "/");
		setcookie("user_fname", "", time() - 600, "/");
		setcookie("user_lname", "", time() - 600, "/");
		setcookie("user_email", "", time() - 600, "/");
		// setcookie($_COOKIE["user_power"], "", time() - 3600, "/");

		$sess = $_COOKIE['user_id'];
		echo $sess;
		session_destroy();
	}
	else {
		echo "oops";
	}

	header('Location: ../pages/account.php');
	die();
?>