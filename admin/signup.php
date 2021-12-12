<?php
include 'includes/session.php';

if(isset($_POST['register'])){


if($_POST['password'] != $_POST['repassword']){
 
$_SESSION['error'] = 'Passwords did not match';
header('location:register.php');
 }
 else{
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$date = date("Y/m/d | h:i:sa");
 $conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, contact, password, date) VALUES (:firstname, :lastname, :email, :contact, :password, :date)");
$stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'contact'=>$contact, 'password'=>$password, 'date'=>$date]);

$_SESSION['success'] = 'You have been successfully Registered!';
header('location:register.php');
  }

}
else{
$_SESSION['error'] = 'A problem occured when registering you!!';
header('location:register.php');
}
?>
