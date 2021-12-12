<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


include 'includes/session.php';

if(isset($_POST['response'])){
  try {  
$message = $_POST['message'];
$pass = $_POST['pass'];
$body = $_POST['body'];
$email = $_POST['email'];
$title = $_POST['title'];

$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE message SET reply=1 WHERE id=:id");
$stmt->execute(['id'=>$message]);

$message = "
				<div style='border-color:#FF1DFF; border-radius:7px; font-family: Verdana, sans-serif;'> 
                 <h1 style='text-align:center;'>'.$title.'</h1>
				 <hr />
				 <img src='https://www.linkpicture.com/q/tsavo.jpg' width='100%' style='border:none;border-radius:3px' />
					<hr />
					
					'.$body.'
					  
					  <hr />
					   <h5 style='text-align:center;'>
					   <b style='color:#FF5440'>Do not reply to this mail. Send your response from our contact page 
					   <a href='https://tsavo.store/contact.php'>Here</a></b></h5>
					<h6 style='text-align:center;'><b style='color:#FF5440'>You can access more content from the CMIL - Kenya website!!</b></h6>

					</div>
					";
}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}
//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
						
				        $mail->isSMTP();                                     
				        $mail->Host = gethostbyname('mail.medialiteracy-kenya.info');                  
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'response@medialiteracy-kenya.info';     
				        $mail->Password = 'vygJOLo;=yIb';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'tls';                           
				        $mail->Port = 587;                                   

				        $mail->setFrom('response@medialiteracy-kenya.info');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('developer@medialiteracy-kenya.info');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'CMIL - Kenya';
				        $mail->Body    = $body;

				        $mail->send();
						
						
$_SESSION['success'] = 'Your response has been successfully sent!';
header('location:message.php?pass='.$pass);
}
catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location:message.php?pass='.$pass);
				    }
}

else{
$_SESSION['error'] = 'An error occurred while trying to send the message!';
header('location:message.php?pass='.$pass);
}
?>
