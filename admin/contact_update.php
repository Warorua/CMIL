<?php
include 'includes/session.php';

if(isset($_POST['tel'])){

$location = $_POST['location'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$geo = $_POST['geo'];

$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE contacts SET location=:location, tel=:contact, email=:email, geo=:geo WHERE id=1");
$stmt->execute(['location'=>$location, 'contact'=>$contact, 'email'=>$email, 'geo'=>$geo]);

$_SESSION['success'] = 'Contact information updated successfully!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'An error occured while updating the contacts! Try again!';
header('location:index.php');
}
?>
