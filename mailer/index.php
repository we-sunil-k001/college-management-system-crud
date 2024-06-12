<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = $_GET['email'];
$unique_id = $_GET['d'];

$message = "
        <pre>
        Hello user,
        
        You have requested for Password reset, please click on the link below:
        <a href='http://localhost:8080/sunil-k001/college-management-system-crud/password-reset.php?id=$unique_id'>Click me</a>
        
        Thanks & regards
        </pre>
        ";

echo smtp_mailer($email,'Password reset request',$message);

function smtp_mailer($to,$subject, $msg){
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'bb41075bc020e8';
    $mail->Password = 'b118c1ce301de7';
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2;

    $mail->setFrom('info@mailtrap.io', 'Mailtrap');
    $mail->Subject = $subject;
    $mail->Body =$msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
        //echo $mail->ErrorInfo;
        echo "  <script>
                        alert('Something went wrong! please try again');
                        window.location.href='../login.php.php';
                    </script> ";
    }
    else{
        //return 'Sent';
        echo "  <script>
                        alert('Email having Password reset link is sent to your registered Mail ID.');
                        window.location.href='../login.php';
                    </script> ";
    }
}
?>