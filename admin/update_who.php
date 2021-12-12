<?php
include 'includes/session.php';
if(isset($_POST['who'])){
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE who_we_are SET head=:title, content=:content WHERE id=:id");
$stmt->execute(['title'=>$title, 'content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'Content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update the content!';
header('location:index.php');
}
?>
