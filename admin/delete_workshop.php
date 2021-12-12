<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM workshop WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'UNESCO Youth MIL workshop successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the UNESCO Youth MIL workshop!';
header('location:index.php');
}
?>
