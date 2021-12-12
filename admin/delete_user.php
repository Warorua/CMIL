<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);
$_SESSION['success'] = 'User has been successfully deleted!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'The user could not be deleted!';
header('location:index.php');
}
?>
