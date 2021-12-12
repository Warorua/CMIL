<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM mil2 WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'Page 2 content successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete Page 2 content!';
header('location:index.php');
}
?>
