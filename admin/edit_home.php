<?php
include 'includes/session.php';

if(isset($_POST['whos'])){
$id = $_POST['auth'];
$head = $_POST['head'];
$content = $_POST['content'];

$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE home SET head=:head, content=:content WHERE id=:id");
$stmt->execute(['id'=>$id, 'head'=>$head, 'content'=>$content]);

$_SESSION['success'] = 'The content has been successfully updated!';
header('location:index.php');

}

else{
$_SESSION['error'] = 'There was a problem encountered while processing your request!!!!';
header('location:index.php');

}
?>
