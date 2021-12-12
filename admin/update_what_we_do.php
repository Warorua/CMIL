<?php
include 'includes/session.php';
if(isset($_POST['what_we_do'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE what_we_do SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'what_we_do content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update the what_we_do content!';
header('location:index.php');
}
?>
