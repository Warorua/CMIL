<?php
include 'includes/session.php';

if(isset($_POST['send'])){

$date = date('d M, Y');
$email = $_POST['email'];
$subject = $_POST['subject'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$message = $_POST['message'];

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO message (date, email, subject, firstname, lastname, message) VALUES (:date, :email, :subject, :firstname, :lastname, :message)");
$stmt->execute(['date'=>$date, 'email'=>$email, 'subject'=>$subject, 'firstname'=>$firstname, 'lastname'=>$lastname, 'message'=>$message]);

$_SESSION['success'] = 'Your message has been successfully sent.';
header('location:contacts.php');

}
else{
$_SESSION['error'] = 'An error occurred while sending your message! Try again!';
header('location:contacts.php');


}
?>
