<?php
include 'includes/session.php';

if(isset($_POST['profile'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$id = $_POST['pass'];
$password = $_POST['password'];

if($password == $user['password']){
  $password = $user['password'];
}
else{
	$password = password_hash($password, PASSWORD_DEFAULT);
}

$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE users SET firstname=:firstname, lastname=:lastname, email=:email, contact=:contact, password=:password WHERE id=:id");
$stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'contact'=>$contact, 'id'=>$id, 'password'=>$password]);

$_SESSION['success'] = 'Profile updated successfully';
header('location:index.php');
}
else{
$_SESSION['error'] = 'An error was encountered while updating your profile!';
header('location:index.php');
}
?>
