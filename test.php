<?php
include('smtp/PHPMailerAutoload.php');

echo smtp_mailer('lefaj94552@cnurbano.com','Subject','html');
function smtp_mailer($to,$subject, $msg){
    $mail = new mail();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'bb41075bc020e8';
    $mail->Password = 'b118c1ce301de7';
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2;
	$mail->SetFrom("sunil-k001@webreinvent.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>