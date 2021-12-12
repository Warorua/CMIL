<?php
include 'includes/session.php';
if(isset($_POST['blog'])){
$head = $_POST['head'];
$content = $_POST['content'];
$name = $_POST['name'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE blog SET head=:head, content=:content, name=:name, brief=:brief WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'name'=>$name, 'id'=>$id, 'brief'=>$content]);

$_SESSION['success'] = 'CMIL Blog successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update CMIL Blog!';
header('location:index.php');
}
?>
