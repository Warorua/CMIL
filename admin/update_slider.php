<?php
include 'includes/session.php';
if(isset($_POST['slider'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE slider SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'slider Content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update slider Content!';
header('location:index.php');
}
?>
