<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$adults = $_POST['adults'];
$kids = $_POST['kids'];
$id = random_int(1, 100);


//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'arama@york.citycollege.eu';                     //SMTP username
    $mail->Password   = '120rik400';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('arama@york.citycollege.eu');
    $mail->addAddress('arama@york.citycollege.eu');     //Add a recipient
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
    
            This is your ticket id: $id<br>
            Keep the id secure because you will need it to enter the zoo.<br><br>

            You have booked $adults adult places.<br><br>
            You have booked $kids kids places.
            
            </p>
        </div>
    


    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    header("Location: ../index.php");
    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>