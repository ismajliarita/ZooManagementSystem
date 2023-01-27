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
    <div class="panel" style="background-image: url('../media/aboutbg.png'); background-position: 0px -30vh;">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="../index.php">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="../pages/ticket.php">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
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
                        echo '<div class="nav-item"><a href="../pages/signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="main-content main">
            <h1>Welcome to Our Zoo!</h1>
            <p>We are a family-friendly zoo in the heart of the city. Our diverse collection of animals, plants, and
                habitats make us a great destination for fun and learning! Our mission is to inspire and educate people
                of all ages about the natural world and its inhabitants.</p>
            <p>We offer a variety of activities and experiences for our visitors, including educational programs,
                interactive exhibits, and animal encounters. Our experienced staff and volunteers are passionate about
                conservation and are committed to helping ensure the survival of our planet’s wildlife and habitats.</p>
            <p>We invite you to come explore our zoo and make memories that will last a lifetime!</p>
        </div>



    </div>

</body>

</html>