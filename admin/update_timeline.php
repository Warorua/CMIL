<?php
include 'includes/session.php';
if(isset($_POST['timeline'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE timeline SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'Timeline Content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update timeline Content!';
header('location:index.php');
}
?>
