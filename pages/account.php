<?php
    if (isset($_COOKIE['user_id'])) {
        session_start();
	}
	else{
		header('Location: ../index.php');
	}

	$con = mysqli_connect("localhost", "root", "", "zoo");
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$user_id = $_COOKIE["user_id"];

	$sql_user = "SELECT * FROM users WHERE id = $user_id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $sql_user));

	$user_fname = $result['fname'];
	$user_lname = $result['lname'];
	$user_email = $result['email'];
	$user_pass = $result['pass'];
	$user_power = $result['power'];

	$sql_pass = "SELECT pass FROM users WHERE id = $user_id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $sql_pass));

	// CHANGE PASSWORD
	if(isset($_POST['pass-new-pass'])) {
		if ($_POST['pass-old-pass'] === $result['pass']) {
			$newpass = $_POST['pass-new-pass'];
			$cpass = $_POST['pass-new-cpass'];

			if ($newpass === $cpass) {
				$sql_changepass = "UPDATE users SET pass = '$newpass' WHERE id = $user_id";
				if (mysqli_query($con, $sql_changepass)) {
					echo "yay";
				}
				else {
					echo "nay";
				}
			}
			else{
				echo "new pass no match";
			}
		}
		else {
			echo "wrong pass";
		}
	}

	// CHNAGE EMAIL
	if(isset($_POST['email-new'])) {
		if ($_POST['email-pass'] === $result['pass']) {
			$newemail = $_POST['email-new'];

			$sql_changeemail = "UPDATE users SET email = '$newemail' WHERE id = $user_id";
			if (mysqli_query($con, $sql_changeemail)) {
				setcookie("user_email", $newemail, time() + 600, "/");

				header('Location: '.$_SERVER['PHP_SELF']);
				die();
			}
			else {
				echo "nay";
			}
		}
		else{
			echo "wrong pass";
		}
	}

	// CHNAGE NAME
	if(isset($_POST['fname-new'])) {
		if ($_POST['name-pass'] === $result['pass']) {
			$newfname = $_POST['fname-new'];
			$newlname = $_POST['lname-new'];

			$sql_changename = "UPDATE users SET fname = '$newfname', lname = '$newlname' WHERE id = $user_id";
			if (mysqli_query($con, $sql_changename)) {
				setcookie("user_fname", $newfname, time() + 600, "/");
				setcookie("user_lname", $newlname, time() + 600, "/");
				
				header('Location: '.$_SERVER['PHP_SELF']);
				die;
			}
			else {
				echo "nay";
			}
		}
		else{
			echo "wrong pass";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zoo Manegment</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../style.css?version=51">
	<script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../style.css"> -->
</head>

<body>
    <div class="panel" style="background-image: url('../media/zoo_zebra.png');">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="../index.php">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="#">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
				<?php
					echo "<div class='nav-item'><a href='account.php'>$user_fname</a></div>";
				?>
            </div>

        </nav>

        <div class="inner-panel">
            <div class="left">
                <div class="form-overlay" id="account-overlay">
					<div class='account-details'>
						<?php
							$user_fname = $_COOKIE['user_fname'];
							$user_lname = $_COOKIE['user_lname'];
							$user_email = $_COOKIE['user_email'];
							$user_power = $_COOKIE['user_power'];

							echo <<<"EOD"
								<p>User: $user_fname $user_lname
								<button class='edit-btn' onclick="editOverlay('update-name-overlay')"> <i class='fa-solid fa-pen'></i></p> </button> <br>
								
								<p>Email: $user_email
								<button class='edit-btn' onclick="editOverlay('update-email-overlay')"> <i class='fa-solid fa-pen'></i></p> </button> <br>
								
								<p>Power: <span style='color: lime'> $user_power </span> </p>
							EOD;
						?>

						<div id="changepass-container">
							<a onclick="editOverlay('update-pass-overlay')" id="changepass-link">Change Password</a>
						</div>
					</div>

					<div class="signup-submit">
						<a href="logout.php"><button type="button" class="signup-button">Log out</button></a>
					</div>
                </div>
            </div>

			<div class="right">
				<!-- CHANGE NAME OVERLAY -->
				<div class="form-overlay" name="update-overlay" id="update-name-overlay">
					<form action="#" method="post">
						<p>First Name</p>
						<input type="text" name="fname-new" id="fname-input" required>

						<p>Last Name</p>
						<input type="text" name="lname-new" id="lname-input" required>

						<p>Password</p>
						<input type="password" name="name-pass" id="pass-check" required>
						
						<div class="signup-submit">
							<button type="submit" class="signup-button">Save</button>
						</div>
					</form>
				</div>

				<!-- CHANGE EMAIL OVERLAY -->
				<div class="form-overlay" name="update-overlay" id="update-email-overlay">
					<form action="#" method="post">
						<p>Email</p>
						<input type="email" name="email-new" id="email-new" required>

						<p>Password</p>
						<input type="password" name="email-pass" id="pass-check" required>
						
						<div class="signup-submit">
							<button type="submit" class="signup-button">Save</button>
						</div>
					</form>
				</div>

				<!-- CHANGE PASS OVERLAY -->
				<div class="form-overlay" name="update-overlay" id="update-pass-overlay">
					<form action="#" method="post">
						<p>Current Password</p>
						<input type="password" name="pass-old-pass" id="email-input" required>

						<p>New Password</p>
						<input type="password" name="pass-new-pass" id="pass-input" oninput="checkRepeatPass()" required>

						<p>Confirm New Password</p>
						<input type="password" name="pass-new-cpass" id="cpass-input" oninput="checkRepeatPass()" required>
						
						<div class="signup-submit">
							<button type="submit" class="signup-button">Save</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>

</body>

<script src="../index.js"></script>

</html>