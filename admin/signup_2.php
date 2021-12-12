<?php
include 'includes/session.php';

if(isset($_POST['register'])){
 $conn = $pdo->open();

 
 
if($_POST['password'] != $_POST['repassword']){
 
$_SESSION['error'] = 'Passwords did not match';
header('location:index.php');
 }
 else{
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$date = date("Y/m/d | h:i:sa");
$rank = $_POST['rank'];

$stmt = $conn->prepare("SELECT *,COUNT(*) as numrows FROM users WHERE email=:email");
$stmt->execute(['email'=>$email]);
$verify = $stmt->fetch();
if($verify['numrows'] > 0){
$_SESSION['error'] = ''.$email.' has already been registered!';
header('location:index.php');
die();
}
 
 
 
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, contact, password, date, status) VALUES (:firstname, :lastname, :email, :contact, :password, :date, :status)");
$stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'contact'=>$contact, 'password'=>$password, 'date'=>$date, 'status'=>$rank]);

if($rank == 1){
$pers = 'an author';
}
else{
$pers = 'a user';
}
$_SESSION['success'] = ''.$firstname.' has been successfully registered as '.$pers.'!';
header('location:index.php');
  }

}
else{
$_SESSION['error'] = 'A problem occured when registering you!!';
header('location:index.php');
}
?>
