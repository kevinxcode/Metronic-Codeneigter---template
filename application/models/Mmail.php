<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

define('mailHost', 'srv72.niagahoster.com');
define('mailUser', 'admin@bestarindo.com');
define('mailPass', 'kevinxcode15');
define('mailName', 'My Workplace | Dynamic HR Solution');

class Mmail extends CI_Model{

	function __construct()
    {
        parent::__construct();
    }

    public function sendMail($email,$subject_mail,$body_email)
	{
        $final_body_email = $body_email;
        $final_body_email .= '<br><br><br>-----<br><b>My Workplace</b> | Dynamic HR Solution';
		// Instantiation and passing `true` enables exceptions   
		$mail = new PHPMailer(true);
		$mail->isSMTP();                                            
		$mail->SMTPSecure = 'tls';                   
		$mail->Host       = mailHost;                   
		// $mail->SMTPDebug   = 2;                                 
		$mail->SMTPAuth   = true;                                 
		$mail->Username   = mailUser;                   
		$mail->Password   = mailPass;                             
		$mail->Port       = 587;                                    
		$mail->setFrom(mailUser, mailName);
		$mail->addAddress($email, $email);     // Add a recipient
		$mail->addReplyTo('no-reply@bestarindo.com');
		$mail->isHTML(true);                                 
		$mail->MsgHTML('testing..');      
		// end Instantiation
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');
		// Attachments
		// $mail->addAttachment('./sabesFile/Recruitment Service Agreement.docx');        
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // attatchment with new name 
		// Content                           
		$mail->Subject = $subject_mail;
		$mail->Body    = $final_body_email;
		if ($mail->send()) {
			return 0; // email send
		} else {
            return $mail->ErrorInfo;
			// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
    }

}