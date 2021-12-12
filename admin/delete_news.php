<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM news WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'News successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the News!';
header('location:index.php');
}
?>
