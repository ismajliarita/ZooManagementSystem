<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
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
    <!-- <link rel="script" href="../index.js"> -->
</head>

<body>
    <div class="panel" style="background-image: url('../media/anda.jpg');">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="../index.php">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="#">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
                <div class="nav-item"><a href="signup.php">Sign Up</a></div>
            </div>

        </nav>

        <div class="inner-panel">
            <div class="left">

            </div>
            <div class="right">
                <div class="form-overlay" id="signup-overlay">
                    <form action="" method="post">
                        <p>First Name</p>
                        <input type="text" name="fname" id="fname-input">

                        <p>Last Name</p>
                        <input type="text" name="lname" id="lname-input">

                        <p>Email</p>
                        <input type="email" name="email" id="email-input">

                        <p>Password</p>
                        <input type="password" name="pass" id="pass-input">

                        <p>Confirm Password</p>
                        <input type="password" name="cpass" id="cpass-input">
                        
                        
                        <div class="signup-submit">
                            <button type="submit" class="signup-button">Sign up</button>
                        </div>
                    </form>

                    <a onclick="goLogin()" id="login-link">Already a user? Log in instead</a>
                </div>

                <div class="form-overlay" id="login-overlay">
                    <form action="" method="post">
                        <p>Email</p>
                        <input type="email" name="email" id="email-input">

                        <p>Password</p>
                        <input type="password" name="pass" id="pass-input">
                        
                        <div class="signup-submit">
                            <button type="submit" class="signup-button">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</body>

<script src="../index.js"></script>

</html>