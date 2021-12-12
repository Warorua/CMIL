<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status'] > 0){
					if(password_verify($password, $row['password'])){
					if($row['status'] != 403){
						if($row['status'] == 2){
							$_SESSION['admin'] = $row['id'];
						}
						else{
							$_SESSION['user'] = $row['id'];
							$_SESSION['success'] = 'You are now successfully logged in';
							}
							}
							else{
							$_SESSION['error'] = 'Account temporarily blocked. Contact the Administrator for assistance!';
							
							}
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				}
				else{
					$_SESSION['error'] = 'Account not activated.';
				}
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	header('location: signin.php');

?>