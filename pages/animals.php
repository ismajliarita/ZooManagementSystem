<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="animals_panel">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="#">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="#">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
                <?php
                    if (isset($_COOKIE['user_fname'])) {
                        $user_fname = $_COOKIE['user_fname'];
                        echo "<div class='nav-item'><a href='../pages/account.php'>$user_fname</a></div>";
                    }
                    else
                        echo '<div class="nav-item"><a href="../pages/signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="inner-panel">
            
        </div>


    </div>    



</body>
</html>