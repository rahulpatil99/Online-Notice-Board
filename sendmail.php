<?php
	require "PHPMailer/PHPMailerAutoload.php";

	
	
	function sendMail($receiver,$data,$sub='Notice Board Email Confirmation')
	{
		$mail = new PHPMailer;


	// SMTP configuration
	
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'ajaykapase2647@gmail.com';
			$mail->Password = 'TechnoCrawl$28@';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('admin@techknowpharma.com', 'PHISHING_DETECTION');
			$mail->addReplyTo('admin@techknowpharma.com', 'PHISHING_DETECTION');

			// Add a recipient
			$mail->addAddress($receiver);

			// Add cc or bcc 
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			// Email subject
			$mail->Subject = $sub;

			// Set email format to HTML
			$mail->isHTML(true);

			// Email body content
			$mailContent = $data;
			$mail->Body = $mailContent;

			// Send email
			if(!$mail->send())
				{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}else
			{
				echo 'Message has been sent';
			}
	}
?>