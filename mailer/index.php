<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'bb41075bc020e8';
    $mail->Password = 'b118c1ce301de7';

    // Sender and recipient settings
    $mail->setFrom('info@mailtrap.io', 'Mailtrap');
    $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
    $mail->addAddress('lefaj94552@cnurbano.com', 'Tim'); // Primary recipient


    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = "PHPMailer SMTP test";
    $mail->Body = '<h1>Send HTML Email using SMTP in PHP</h1><p>This is a test email I\'m sending using SMTP mail server with PHPMailer.</p>'; // Example HTML body
    $mail->AltBody = 'This is the plain text version of the email content';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent!';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>