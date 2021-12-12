<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$contact = '254'.$_POST['contact'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['contact'] = $contact;

		if(!isset($_SESSION['captcha'])){
			require('recaptcha/src/autoload.php');		
			// $recaptcha = new \ReCaptcha\ReCaptcha('6LcxXmIaAAAAAFSY6wjaHDl65lmpTyXu-iBYBhp3', new \ReCaptcha\RequestMethod\SocketPost());
			$recaptcha = new \ReCaptcha\ReCaptcha('6LeRDMgbAAAAAK6O0vxwhtKMJG_-xPRk5Z1ENFOF');
			$resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                      ->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
			// $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

			if (!$resp->isSuccess()){
		  		$_SESSION['error'] = 'Please answer recaptcha correctly';
		  		header('location: signup.php');	
		  		exit();	
		  	}	
		  	else{
		  		$_SESSION['captcha'] = time() + (10*60);
		  	}

		}

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, contact, password, firstname, lastname, activate_code, date) VALUES (:email, :contact, :password, :firstname, :lastname, :code, :now)");
					$stmt->execute(['email'=>$email, 'contact'=>$contact, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$message = "
				<div style='border-color:#FF1DFF; border-radius:7px; font-family: Verdana, sans-serif;'> 
                 <h1 style='text-align:center;'>Thank you for Registering.</h1>
				 <hr />
				 <img src='https://medialiteracy-kenya.info/cmil.png' width='100%' style='border:none;border-radius:3px' />
					<hr />
					<p style='text-align:center;'>Hello, ".$firstname.". Your account has been successfully registered. Below are your account details as you put them up on registration. <br /> Click the [Activate Account] button below to activate your account.</p>
					<h2 style='text-align:center;'>Your Account Details:</h2>
				<table style='text-align:center;' width='100%' border='0' cellpadding='0' cellspacing='0' class='table table-bordered'>
					<thead>
					<th style='border: 1px solid #5E0000; padding: 0.5rem; border-top-left-radius:3px; border-top-right-radius:3px'><b>Email:</b></th>
					</thead>
					<tr>
					<td style='border: 1px solid #5E0000; padding: 0.5rem; background-color:#D6D0D1' >".$email."</td>
					</tr>
				</table>
					<hr />
						<h3 style='text-align:center;'>Please click the button below to activate your account.</h3>
						 <br />
					  <button style=' padding: 0.5rem; border-radius:3px; background-color:#E95237; border:none; margin-left:45%;'>
					  <a style='text-decoration:none; color:white' href='https://medialiteracy-kenya.info/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					 </button>
					 <h3 style='text-align:center;'>Or click the link below</h3>
					  <a style='text-decoration:none; color:#DF19C5; margin-left:45%;' href='https://medialiteracy-kenya.info/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					 <hr />
					   <h5 style='text-align:center;'><b style='color:#FF5440'>You can access more content from the CMIL - Kenya website!!</b></h5>
					
					</div>
					";

					//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
						
				        $mail->isSMTP();                                     
				        $mail->Host = gethostbyname('mail.medialiteracy-kenya.info');                  
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'noreply@medialiteracy-kenya.info';     
				        $mail->Password = 'dCKe8aiH2cnJ';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'tls';                           
				        $mail->Port = 587;                                   

				        $mail->setFrom('noreply@medialiteracy-kenya.info');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('developer@medialiteracy-kenya.info');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'CMIL - Kenya';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        {$_SESSION['success'] = 'Account created. Check your email to activate it.';
				        header('location: signup.php');}

				    } 
									
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }

				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: signup.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Complete filling the signup form first';
		header('location: signup.php');
	}