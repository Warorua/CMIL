<?php
include 'includes/session.php';
if(isset($_POST['mil_resources'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE mil_resources SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'MIL Resources successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update MIL Resources!';
header('location:index.php');
}
?>
