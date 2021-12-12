<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM civic_engagement WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'Civic Engagement content successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete Civic Engagement content!';
header('location:index.php');
}
?>
