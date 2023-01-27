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

			$sql_changepass = "UPDATE users SET pass = '$newpass' WHERE id = $user_id";
			if (mysqli_query($con, $sql_changepass)) {
				echo "yay";
			}
			else {
				echo "nay";
			}
		}
		else {
			$GLOBALS["exception"] = "Password incorrect!";
		}
	}

	// CHNAGE EMAIL
	if(isset($_POST['email-new'])) {
		if ($_POST['email-pass'] === $result['pass']) {
			$newemail = $_POST['email-new'];

			$sql_changeemail = "UPDATE users SET email = '$newemail' WHERE id = $user_id";
			try {
				mysqli_query($con, $sql_changeemail);
				setcookie("user_email", $newemail, time() + 600, "/");

				header('Location: '.$_SERVER['PHP_SELF']);
				die();
			} catch (mysqli_sql_exception $e) {
				$GLOBALS["exception"] = "Email already exsists!";
			}
		}
		else{
			$GLOBALS["exception"] = "Password incorrect!";
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
			$GLOBALS["exception"] = "Password incorrect!";
		}
	}

	// REGISTER ADMIN ACCOUNT
	if(isset($_POST['reg-fname'])) {
		$reg_fname = $_POST['reg-fname'];
		$reg_lname = $_POST['reg-lname'];
		$reg_email = $_POST['reg-email'];
		$reg_pass = $_POST['reg-pass'];
		$reg_cpass = $_POST['reg-cpass'];
		$reg_power = $_POST['reg-power'];

		$sql_reg = "INSERT INTO users (fname, lname, email, pass, power) VALUES ('$reg_fname', '$reg_lname', '$reg_email', '$reg_pass', '$reg_power')";
		try {
			mysqli_query($con, $sql_reg);
			
			$GLOBALS["success"] = "$reg_power account created!";
		} catch (mysqli_sql_exception $e) {
			$GLOBALS["exception"] = "Email already exsists!";
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
                <div class="nav-item"><a href="../pages/ticket.php">Tickets</a></div>
                <div class="nav-item"><a href="../pages/about.php">About</a></div>
				<?php
                    if (isset($_COOKIE['user_fname'])) {
                        $user_fname = $_COOKIE['user_fname'];
                        $user_power = $_COOKIE['user_power'];
                        
                        switch ($user_power) {
                            case "User":
                                echo "<i class='user-icon user fa-solid fa-user'></i>";
                                break;
                            case "Helper":
                                echo "<i class='user-icon helper fa-solid fa-shield-halved'></i>";
                                break;
                            case "Admin":
                                echo "<i class='user-icon admin fa-solid fa-crown'></i>";
                                break;
                        }

                        echo "<div class='nav-item'><a href='pages/account.php'>$user_fname</a></div>";
                    }
                    else {
						header('Location: ../index.php');
                        die();
					}
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

					<?php
						$user_power = $_COOKIE['user_power'];

						if ($user_power === "Admin") {
							echo <<<"EOD"
								<button type='button' class='signup-button' onclick='editOverlay("register-new-overlay")'>Register Account</button>
							EOD;
						}
					?>
				
					<a href="logout.php"><button type="button" class="signup-button">Log out</button></a>
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
					<form action="#" method="post" onsubmit="return checkRepeatPass('pass-input', 'cpass-input')">
						<p>Current Password</p>
						<input type="password" name="pass-old-pass" id="email-input" required>

						<p>New Password</p>
						<input type="password" name="pass-new-pass" id="pass-input" oninput="checkRepeatPass('pass-input', 'cpass-input')" required>

						<p>Confirm New Password</p>
						<input type="password" name="pass-new-cpass" id="cpass-input" oninput="checkRepeatPass('pass-input', 'cpass-input')" required>
						
						<div class="signup-submit">
							<button type="submit" class="signup-button">Save</button>
						</div>
					</form>
				</div>

				<!-- REGISTER NEW ACCOUNT -->
				<div class="form-overlay" name="update-overlay" id="register-new-overlay">
					<form action="#" method="post" oninput="return checkRepeatPass('reg-pass-input', 'reg-cpass-input')">
						<div class="fullname-field">
							<div>
								<p>First Name</p>
								<input type="text" name="reg-fname" id="fname-input" required>
							</div>

							<div>
								<p>Last Name</p>
								<input type="text" name="reg-lname" id="lname-input" required>
							</div>
						</div>

                        <p>Email</p>
                        <input type="email" name="reg-email" id="email-input" required>

                        <p>Password</p>
                        <input type="password" name="reg-pass" id="reg-pass-input" oninput="checkRepeatPass('reg-pass-input', 'reg-cpass-input')" required>

                        <p>Confirm Password</p>
                        <input type="password" name="reg-cpass" id="reg-cpass-input" oninput="checkRepeatPass('reg-pass-input', 'reg-cpass-input')" required>
                        
						<p>Power</p>
						<div class="fullname-field" id="power-field">
							<div><input type="radio" name="reg-power" value="Admin" required>Admin</div>
							<div><input type="radio" name="reg-power" value="Helper" required>Helper</div>
						</div>
                        
                        <div class="signup-submit">
                            <button type="submit" class="signup-button">Create</button>
                        </div>
					</form>
				</div>
				
				<!-- ATTENTION CATCHER OVERLAY -->
				<?php
                    if (isset($GLOBALS['exception'])) {
                        $exception = $GLOBALS['exception'];
                    
                        echo "<div class='exception-overlay' name='update-overlay'>
                            <i class='exception-icon fa-solid fa-triangle-exclamation'></i>
                            $exception
							</div>";
						}
						
					if (isset($GLOBALS['success'])) {
						$success = $GLOBALS['success'];
						
						echo "<div class='exception-overlay' name='update-overlay'>
							<i class='success-icon fa-regular fa-circle-check'></i>
							$success
						</div>";
                    }
                ?>
			</div>
        </div>
    </div>

</body>

<script src="../index.js"></script>

</html>

