<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM what_we_do WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'what_we_do content successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the what_we_do content!';
header('location:index.php');
}
?>
