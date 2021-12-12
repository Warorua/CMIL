<?php
include 'includes/session.php';
if(isset($_POST['page1'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE mil SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'Page 1 Content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update Page 1 Content!';
header('location:index.php');
}
?>
