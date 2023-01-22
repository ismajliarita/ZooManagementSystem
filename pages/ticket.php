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

    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="panel" style="background-image: url('../media/tigers.png');">
        <nav class="nav">

            <img src="../media/logo.png" id="logo" />

            <div class="nav-items">
                <div class="nav-item"><a href="../index.php">Home</a></div>
                <div class="nav-item"><a href="#">Animals</a></div>
                <div class="nav-item"><a href="#">Tickets</a></div>
                <div class="nav-item"><a href="#">About</a></div>
                <?php
                if (isset($_COOKIE['user_fname'])) {
                    $user_fname = $_COOKIE['user_fname'];
                    echo "<div class='nav-item'><a href='pages/account.php'>$user_fname</a></div>";
                } else
                    echo '<div class="nav-item"><a href="pages/signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="inner-panel" style="align-items: center; justify-content: center;">

            <div class="ticket-card">
                <div class="ticket-content">
                    <h1 style="text-align: center;">~ Ticket for visiting ZoZo ~</h1>
                    <div class="ticket-text">
                        <p>
                            Welcome to the zoo! <br>
                            Please enjoy your day and have a wild time.<br>
                            Remember to follow the zoo rules and stay safe.
                        </p>
                        <form action="" class="ticket-form">
                            <?php

                            if (isset($_COOKIE['user_email'])) {
                                $email = $_COOKIE['user_email'];
                            } else {
                                $email = "Please log in to book a ticket";
                            }
                            echo "<div class='email-form'>
                            <p>Email :</p><input type='email' name='emial' id='ticketEmail' readonly     value='$email' >
                                </div>"

                                ?>
                            <div id="ticket-amount">
                                <div>
                                    <p>Adults : </p>
                                    <input type="number" name="" id="" value="0" required>
                                    <p>Children : </p>
                                    <input type="number" name="" id="" value="0" required>
                                </div>

                                <button type="submit" id="submit" onclick="sendMsg">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="ticket-code">
                    <img src="../media/barcode.png" />
                </div>
            </div>

        </div>


    </div>



</body>

</html>