<?php
    if (isset($_COOKIE['user_fname']))
        session_start();

	$con = mysqli_connect("localhost", "root", "", "zoo");
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$animal_id = $_GET['id'];

	$sql_get = "SELECT * FROM animals WHERE id = '$animal_id'";
	$result = mysqli_fetch_assoc(mysqli_query($con, $sql_get));

	$GLOBALS['animal'] = $result;
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

    <link rel="stylesheet" href="../style.css">
	<script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>
</head>

<body>
	<?php
		$habitat = $GLOBALS['animal']['habitat'];
		$format = strtolower($habitat);

    	echo <<<"EOD"
			<div class='panel' style='background-image: url("../media/$format-bg.png");'>
		EOD;
	?>
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

                        echo "<div class='nav-item'><a href='../pages/account.php'>$user_fname</a></div>";
                    }
                    else
                        echo '<div class="nav-item"><a href="../pages/signup.php">Log In</a></div>';
                ?>
            </div>

        </nav>

		<?php
			$name = $GLOBALS['animal']['name'];
			$age = $GLOBALS['animal']['age'];
			$type = $GLOBALS['animal']['type'];
			$habitat = $GLOBALS['animal']['habitat'];
			$desc = $GLOBALS['animal']['description'];

			$format = strtolower($habitat);

        	echo <<<"EOD"
				<div class='animal-main $format'>
					<div class="animal-info-container">
						<h1>$name</h1>
						<div> Age: <h4>$age</h4> </div>
						<div> Habitat: <h4 id="$format">$habitat</h4></div>
						<div> Family: <h4>$type</h4> </div>
					</div>
					
					<div class="animal-img-container">
						<div class="animal-img">
							<img src="../media/grizzy-test.png"/>
						</div>
					</div>
					
					<div class="animal-desc-container">$desc
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, rerum fugiat sunt molestias iure atque aut itaque alias, minus labore voluptatibus ipsa sequi ipsam. Maiores alias fugiat natus accusantium. Explicabo? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus soluta iste voluptatum vitae eveniet ut ipsam fugiat tempora magnam reprehenderit. Culpa ratione id veniam dolores. Aut eum molestiae magnam incidunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, rerum fugiat sunt molestias iure atque aut itaque alias, minus labore voluptatibus ipsa sequi ipsam. Maiores alias fugiat natus accusantium. Explicabo? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus soluta iste voluptatum vitae eveniet ut ipsam fugiat tempora magnam reprehenderit. Culpa ratione id veniam dolores. Aut eum molestiae magnam incidunt
					</div>
				</div>
			EOD
		?>
        
    </div>
</body>

</html>