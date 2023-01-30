<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    $con = mysqli_connect("localhost", "root", "", "zoo");
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}

    
    if (isset($_COOKIE["loggged"]) && isset($_POST['ticket-email'])) {
        if (!($_POST['ticket-adults'] < 1) && !($_POST['ticket-childs'] < 0)) {
            $ticket_email = $_POST['ticket-email'];
            $ticket_adults = $_POST['ticket-adults'];
            $ticket_childs = $_POST['ticket-childs'];

            $sql_userid = "SELECT id FROM users WHERE email = '$ticket_email'";
            $result = mysqli_fetch_assoc(mysqli_query($con, $sql_userid));
            $user_id = $result['id'];

            $sql_book = "INSERT INTO tickets (user_id, adults, children) VALUES ('$user_id', '$ticket_adults', '$ticket_childs')";
            try {
                mysqli_query($con, $sql_book);

                $GLOBALS['success'] = 'Ticket booked successfully!';
            } catch (mysqli_sql_exception $e) {
                // Duplicate entry for id
                $sql_del = "DELETE FROM tickets WHERE user_id = '$user_id'";
                mysqli_query($con, $sql_del);

                mysqli_query($con, $sql_book);

                $GLOBALS['success'] = 'New ticket saved successfully!';
            }




            // $email = $_POST['email'];
            // $adults = $_POST['adults'];
            // $kids = $_POST['kids'];
            // $id = random_int(1, 100);


            //Load Composer's autoloader
            require '../vendor/autoload.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'arama@york.citycollege.eu';                     //SMTP username
                $mail->Password   = '120rik400';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($ticket_email);
                $mail->addAddress($ticket_email);     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Ticket comfirmation';
                $mail->Body = 
                
                " 
                    <div>
                        <h1>Ticket comfirmation</h1>
                        <p>
                        This is a comfirmation about your ticket:<br><br>
                
                        This is your ticket id: $user_id<br>
                        Keep the id secure because you will need it to enter the zoo.<br><br>

                        You have booked $ticket_adults adult places.<br><br>
                        You have booked $ticket_childs kids places.
                        
                        </p>
                    </div>
                


                ";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                // header("Location: ../index.php");
                $mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


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
    <title>Ticket Page</title>
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
                                if (isset($_COOKIE['logged'])) {
                                    $email = $_SESSION['user_email'];
                                } else {
                                    $email = "Please log in to book a ticket";
                                }

                                echo "<div class='email-form'>
                                    <p>Email: <input type='email' name='ticket-email' id='ticket-email' readonly value='$email' ></p>
                                </div>";
                            ?>

                            <div  id="ticket-amount">
                                <div>
                                    <p>Adults : 
                                    <input type="number" name="ticket-adults" id="ticket-adults" value="1" min="1" required>
                                    </p>
                                    <p>Children : 
                                    <input type="number" name="ticket-childs" id="ticket-childs" value="0" min="0" required>
                                    </p>
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

            <?php
                if (isset($_COOKIE['logged'])) {
                    $user_id = $_SESSION['user_id'];

                    $sql_get = "SELECT * FROM tickets WHERE user_id = '$user_id'";

                    $result = mysqli_fetch_assoc(mysqli_query($con, $sql_get));

                    if($result) {
                        $adults = $result['adults'];
                        $childs = $result['children'];
                        
                        echo "<div class='exception-overlay'>
                            <i class='success-icon fa-solid fa-ticket'></i>
                            Your current ticket: $adults Adult, $childs Children.
                        </div>";
                    }
                }
            ?>
        </div>
    </div>
    <script src="../index.js"></script>
    
</body>

</html>