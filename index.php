<?php
    if (isset($_COOKIE['user_fname']))
        session_start();
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

    <link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="panel">
        <nav class="nav">

            <img src="./media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="#">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="pages/ticket.php">Tickets</a></div>
                <div class="nav-item"><a href="pages/about.php">About</a></div>
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
                    else
                        echo '<div class="nav-item"><a href="pages/signup.php">Log In</a></div>';
                ?>
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

        </nav>

        <div class="inner-panel">
            <div id="index-left" class="left">
                <div class="main-content">
                    <h1>Welcome to The ZOO</h1>
                    <p style="color: gold;">See the world's wildest animals <br> at The ZOO!</p]>
                    <div class="buttons">
                        <input type="button" id="animals-button" value="Check Animals">
                        <input type="button" id="ticket-button" value="Book a Visit">
                    </div>
                </div>
            </div>
            <div id="index-right" class="right"></div>
        </div>


    </div>
    

<script src="index.js"></script>


</body>

</html>