<?php
include 'includes/session.php';

if(isset($_SESSION['activate_user'])){
$id = $_GET['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);
$auth = $stmt->fetch();

if($auth['numrows'] > 0){
$stmt = $conn->prepare("UPDATE users SET status=1 WHERE id=:id");
$stmt->execute(['id'=>$id]);

unset($_SESSION['activate_user']);
$_SESSION['success'] = 'User has been successfully activated!';
header('location:index.php');
}
else{

unset($_SESSION['activate_user']);
$_SESSION['error'] = 'Invalid user selected!';
header('location:index.php');
}
}
else{
$_SESSION['error'] = 'Malicious activity detected. Your request could not be processed!';
header('location:index.php');
}
?>
