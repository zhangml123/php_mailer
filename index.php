<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';
function sendMail($to,$title,$content){
	$mail = new PHPMailer();
	try {
		
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.example.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'example@example.com';                     // SMTP username
			$mail->Password   = 'example';                               // SMTP password
			$mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 465;
			$mail->CharSet = 'UTF-8';
			$mail->FromName = 'aaaa';
			//Recipients
			$mail->setFrom('example@example.com', 'Mailer');//// $mail->Username
			$mail->addAddress($to);     // Add a recipient
			

			// Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if($mail->send()) {
			return true;
		}else{
			return false;
		}
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

header("Content-Type:text/html;charset=utf-8");
$flag = sendMail('example@qq.com','aaa','你好');
if($flag){
    echo "发送邮件成功！";
}else{
    echo "发送邮件失败！";
}

?>