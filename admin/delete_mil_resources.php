<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM mil_resources WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'MIL Resources successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the MIL Resources!';
header('location:index.php');
}
?>
