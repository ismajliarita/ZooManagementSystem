<?php
    if (isset($_COOKIE['username']))
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
</head>

<body>
    <div class="panel">
        <nav class="nav">

            <img src="./media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="#">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="#">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
                <?php
                    if (isset($_COOKIE['user_fname'])) {
                        $user_fname = $_COOKIE['user_fname'];
                        echo "<div class='nav-item'><a href='pages/account.php'>$user_fname</a></div>";
                    }
                    else
                        echo '<div class="nav-item"><a href="pages/signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="inner-panel">
            <div class="left">
                <div class="main-content">
                    <h1>Welcome to The ZOO</h1>
                    <pre>See the world's wildest animals <br> at The ZOO!</pre>
                    <div class="buttons">
                        <input type="button" id="animals-button" value="Check Animals">
                        <input type="button" id="ticket-button" value="Book a Visit">
                    </div>
                </div>
            </div>
            <div class="right"></div>
        </div>


    </div>

</body>

</html>