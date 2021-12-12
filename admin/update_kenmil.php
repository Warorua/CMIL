<?php
include 'includes/session.php';
if(isset($_POST['kenmil'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE kenmil SET head=:head, content=:content, brief=:brief WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id, 'brief'=>$content]);

$_SESSION['success'] = 'Kenya MIL Alliance successfully updated!';
header('location:kenmil_list.php');
}
else{
$_SESSION['error'] = 'Could not update the Kenya MIL Alliance!';
header('location:index.php');
}
?>
