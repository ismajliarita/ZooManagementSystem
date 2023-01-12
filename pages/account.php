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

	// if(isset())
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
							// $user_power = $_COOKIE['user_power'];

							echo <<<"EOD"
								<p>User: $user_fname $user_lname
								<button class='edit-btn' onclick="editOverlay('update-name-overlay')"> <i class='fa-solid fa-pen'></i></p> </button> <br>
								
								<p>Email: $user_email
								<button class='edit-btn' onclick="editOverlay('update-email-overlay')"> <i class='fa-solid fa-pen'></i></p> </button> <br>
										
								<p>Power: <span style='color: lime'>User</span> </p>
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
				<div class="form-overlay" name="update-overlay" id="update-name-overlay">
					<form action="#" method="post">
						<p>First Name</p>
						<input type="text" name="fname" id="fname-input" required>

						<p>Last Name</p>
						<input type="text" name="lname" id="lname-input" required>

						<p>Password</p>
						<input type="password" name="pass" id="pass-input" oninput="checkRepeatPass()" required>
						
						<div class="signup-submit">
							<button type="submit" class="signup-button">Save</button>
						</div>
					</form>
				</div>

				<div class="form-overlay" name="update-overlay" id="update-email-overlay">
					<form action="#" method="post">
						<p>Email</p>
						<input type="email" name="email" id="email-input" required>

						<p>Password</p>
						<input type="password" name="pass" id="pass-input" oninput="checkRepeatPass()" required>
						
						<div class="signup-submit">
							<button type="submit" class="signup-button">Save</button>
						</div>
					</form>
				</div>

				<div class="form-overlay" name="update-overlay" id="update-pass-overlay">
					<form action="#" method="post">
						<p>Current Password</p>
						<input type="email" name="email" id="email-input" required>

						<p>New Password</p>
						<input type="password" name="pass" id="pass-input" oninput="checkRepeatPass()" required>

						<p>Confirm New Password</p>
						<input type="password" name="pass" id="pass-input" oninput="checkRepeatPass()" required>
						
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