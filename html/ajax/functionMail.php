<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/PHPMailer-master/src/Exception.php';
require '../phpMailer/PHPMailer-master/src/PHPMailer.php';
require '../phpMailer/PHPMailer-master/src/SMTP.php';



    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;       //SMTP::DEBUG_SERVER;            //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lupum.confirmation@gmail.com';         //SMTP username
        $mail->Password   = 'MDP.De.Qualite';                       //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lupum.confirmation@gmail.com', 'Lupum');
        $mail->addAddress($_GET['mail']);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_GET['subject'];
        $mail->Body    = '<p>Veuillez cliquer sur le lien pour verifier votre compte</p> <br> <a href="https://lupum.ddns.net/verificationEmail.php"> Cliquer ici ! </a>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
?>