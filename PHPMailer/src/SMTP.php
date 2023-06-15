<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'mail.dadus-suku.online';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'campoalor@dadus-suku.online';                     //SMTP username
//     $mail->Password   = 'YEm905&dXz~q';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    if (isset($_POST["send"])) {
        # code...
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.dadus-suku.online';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'campoalor@dadus-suku.online';                     //SMTP username
        $mail->Password   = 'YEm905&dXz~q';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // $mail->setFrom('from@example.com', 'Mailer');
    $mail->setFrom('campoalor@dadus-suku.online', 'SISCA - Sistema Informasaun Suku Campo Alor');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($_POST['email'], $_POST['name']);
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('$_POST$email', 'Information'); 
    // $mail->addReplyTo( $_POST['email'], $_POST['name']);
    $mail->addCC('marlora010121@gmail.com');
    $mail->addBCC('maria.viana.belo@gmail.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'SISCA - Sistema Informasaun Suku Campo Alor';
    $mail->Body    = 'Obrigado! Ita rejista ona iha <b>Dadus Suku Campo Alor</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Thank you! Your Message has been sent!';
}