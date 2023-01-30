<?php
    session_start();

    if(isset($_COOKIE['logged'])){
        header('Location: ../pages/account.php');
    }

    // if (isset($_COOKIE['username'])) {

    $con = mysqli_connect("localhost", "root", "", "zoo");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // LOG IN
    if (isset($_GET['email']) && isset($_GET['pass']) )
    {
        $email = mysqli_real_escape_string($con, $_GET['email']);
        $pass = $_GET['pass'];
        
        $sql_auth = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_fetch_assoc(mysqli_query($con, $sql_auth));
        
        if ($result != null && $result['pass'] == $pass) {
            echo "Successfully logged in";
            $user_id = $result['id'];
            $user_fname = $result['fname'];
            $user_lname = $result['lname'];
            $user_email = $result['email'];
            $user_power = $result['power'];
            
            setcookie("logged", $user_id, time() + 900, "/");
            // setcookie("user_fname", $user_fname, time() + 600, "/");
            // setcookie("user_lname", $user_lname, time() + 600, "/");
            // setcookie("user_email", $user_email, time() + 600, "/");
            // setcookie("user_power", $user_power, time() + 600, "/");
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_fname'] = $user_fname;
            $_SESSION['user_lname'] = $user_lname;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_power'] = $user_power;
            
            header('Location: ../index.php');
            die();
        } else {
            $GLOBALS["exception"] = "Credentials incorrect!";
        }
    }

    // SIGN UP
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['reg-email']) && isset($_POST['reg-pass']) && isset($_POST['reg-cpass']) )
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['reg-email'];
        $regpass = $_POST['reg-pass'];
        $cpass = $_POST['reg-cpass'];
    
        $sql_adduser = "INSERT INTO users (fname, lname, email, pass, power) VALUES ('$fname', '$lname', '$email', '$regpass', 'User')";

        $sql_id = "SELECT * FROM users WHERE email = '$email'";
        
        if($regpass === $cpass) {

            try {
                mysqli_query($con, $sql_adduser);
                echo "New record created successfully";
    
                $result = mysqli_fetch_assoc(mysqli_query($con, $sql_id));

                session_start();

                $id = $result['id'];
                $power = $result['power'];
                // setcookie("user_id", $id, time() + 600, "/");
                // setcookie("user_fname", $fname, time() + 600, "/");
                // setcookie("user_lname", $lname, time() + 600, "/");
                // setcookie("user_email", $email, time() + 600, "/");
                // setcookie("user_power", $power, time() + 600, "/");

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_fname'] = $user_fname;
                $_SESSION['user_lname'] = $user_lname;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_power'] = $user_power;

                header('Location: ../index.php');
                die();

                mysqli_close($con);

            } catch (mysqli_sql_exception $e) {
                // echo "Duplicate entry for key 'email'";

                $GLOBALS["exception"] = "Email already exists!";
            }
            
        }
        else {
            // echo "Passwords do not match";

            $GLOBALS["exception"] = "Passwords don't match!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="../media/logo.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../style.css">
	<script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>
    <!-- <link rel="script" href="../index.js"> -->
</head>

<body>
<div class="panel" style="background-image: url('../media/anda.jpg');">
    <nav class="nav">

        <img src="../media/logo.png" id="logo" />

        <div class="nav-items">
            <div class="nav-item"><a href="../index.php">Home</a></div>
            <div class="nav-item"><a href="../pages/habitatMap.php">Habitats</a></div>
            <div class="nav-item"><a href="../pages/animalFacts.php">AnimalFacts</a></div>
            <div class="nav-item"><a href="../pages/ticket.php">Tickets</a></div>
            <div class="nav-item"><a href="../pages/about.php">About</a></div>
            <?php
                if (isset($_COOKIE['logged'])) {
                    $user_fname = $_SESSION['user_fname'];
                    $user_power = $_SESSION['user_power'];
                    
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

        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

    </nav>

    <div class="inner-panel">
        <div class="left">
            <?php
                if (isset($GLOBALS['exception'])) {
                    $exception = $GLOBALS['exception'];
                
                    echo "<div class='exception-overlay'>
                        <i class='exception-icon fa-solid fa-triangle-exclamation'></i>
                        $exception
                    </div>";
                }
            ?>
        </div>

        <div class="right">
            <div class="form-overlay" id="signup-overlay">
                <form action="#" method="post" onsubmit="return checkRepeatPass('pass-input', 'cpass-input')">
                    <p>First Name</p>
                    <input type="text" name="fname" id="fname-input" required>

                    <p>Last Name</p>
                    <input type="text" name="lname" id="lname-input" required>

                    <p>Email</p>
                    <input type="email" name="reg-email" id="email-input" required>

                    <p>Password</p>
                    <input type="password" name="reg-pass" id="pass-input" oninput="checkRepeatPass('pass-input', 'cpass-input')" required>

                    <p>Confirm Password</p>
                    <input type="password" name="reg-cpass" id="cpass-input" oninput="checkRepeatPass('pass-input', 'cpass-input')" required>
                    
                    
                    <div class="signup-submit">
                        <button type="submit" class="signup-button">Sign up</button>
                    </div>
                </form>

            </div>

            <div class="form-overlay" id="login-overlay">
                <form action="#" method="get">
                    <p>Email</p>
                    <input type="email" name="email" id="email" required>

                    <p>Password</p>
                    <input type="password" name="pass" id="pass" required>
                    
                    <div class="signup-submit">
                        <button type="submit" class="signup-button">Log in</button>
                    </div>
                </form>

                <a onclick="goLogin()" id="login-link">Don't have an account? Sign up now</a>
            </div>
        </div>
    </div>
</div>

</body>

<script src="../index.js"></script>

</html>