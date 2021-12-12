<?php
include 'includes/session.php';

if(isset($_POST['profile'])){

$contact = $_POST['contact'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$curpass = $_POST['curpass'];
$password = $_POST['password'];
$conn = $pdo->open();

if(password_verify($curpass, $user['password'])){

if($password == $user['password']){
$password = $user['password'];
}
else{
$password = password_hash($password, PASSWORD_DEFAULT);
}



$stmt = $conn->prepare("UPDATE users SET password=:password, contact=:contact, email=:email, firstname=:firstname, lastname=:lastname WHERE id=:id");
$stmt->execute(['id'=>$user['id'], 'password'=>$password, 'contact'=>$contact, 'email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname]);

$_SESSION['success'] = 'Account updated successfully';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Wrong password! Try again.';
header('location:index.php');
die();
}
}
else{
$_SESSION['error'] = 'An error occured while updating your account!';
header('location:index.php');

}
?>
