<?php
    if (isset($_COOKIE['user_fname']))
        session_start();

    $con = mysqli_connect("localhost", "root", "", "zoo");
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

    if (isset($_POST['ticket-email'])) {
        if (!($_POST['ticket-adults'] < 1) && !($_POST['ticket-childs'] < 0)) {
            $ticket_email = $_POST['ticket-email'];
            $ticket_adults = $_POST['ticket-adults'];
            $ticket_childs = $_POST['ticket-childs'];

            $sql_userid = "SELECT id FROM users WHERE email = '$ticket_email'";
            $result = mysqli_fetch_assoc(mysqli_query($con, $sql_userid));
            $user_id = $result['id'];

            $sql_book = "INSERT INTO tickets (user_id, adults, children) VALUES ('$user_id', '$ticket_adults', '$ticket_childs')";
            mysqli_query($con, $sql_book);

            $GLOBALS['success'] = 'Ticket booked successfully!';
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

    <link rel="stylesheet" href="../style.css">
	<script src="https://kit.fontawesome.com/413ecd623f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="panel" style="background-image: url('../media/tigers.png');">
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
                        echo '<div class="nav-item"><a href="../pages/signup.php">Sign Up</a></div>';
                ?>
            </div>

        </nav>

        <div class="inner-panel"  style='flex-direction: column; justify-content: center; align-items: center;'>
            <?php
                if (isset($GLOBALS['success'])) {
                    $success = $GLOBALS['success'];
                    
                    echo "<div class='exception-overlay'>
                        <i class='success-icon fa-regular fa-circle-check'></i>
                        $success
                    </div>";
                }
            ?>

            <div class="ticket-card">
                <div class="ticket-content">
                    <h1 style="text-align: center;">~ Ticket for visiting ZoZo ~</h1>
                    <div class="ticket-text">
                        <p>
                            Welcome to the zoo! <br>
                            Please enjoy your day and have a wild time.<br>
                            Remember to follow the zoo rules and stay safe.
                        </p>

                        <form action="#" class="ticket-form" method="POST">
                            <?php
                                if (isset($_COOKIE['user_email'])) {
                                    $email = $_COOKIE['user_email'];
                                } else {
                                    $email = "Please log in to book a ticket";
                                }

                                echo "<div class='email-form'>
                                    <p>Email :</p><input type='email' name='ticket-email' id='ticket-email' readonly value='$email' >
                                </div>";
                            ?>

                            <div id="ticket-amount">
                                <div>
                                    <p>Adults : </p>
                                    <input type="number" name="ticket-adults" id="ticket-adults" value="1" min="1" required>
                                    <p>Children : </p>
                                    <input type="number" name="ticket-childs" id="ticket-childs" value="0" min="0" required>
                                </div>

                                <button type="submit" id="submit-btn">Submit</button>

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