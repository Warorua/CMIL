<?php
include 'includes/session.php';
if(isset($_POST['civic'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE civic_engagement SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'Civic Engagement Content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update Civic Engagement Content!';
header('location:index.php');
}
?>
