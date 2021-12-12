<?php
include 'includes/session.php';
if(isset($_POST['clicks'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE clicks SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'UNESCO MIL clicks successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update the UNESCO MIL clicks!';
header('location:index.php');
}
?>
