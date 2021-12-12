<?php
include 'includes/session.php';
if(isset($_POST['mil_africa'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE mil_africa SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'MIL in Africa successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update MIL in Africa!';
header('location:index.php');
}
?>
