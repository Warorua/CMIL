<?php
include 'includes/session.php';
if(isset($_POST['news'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE news SET head=:head, content=:content, preview=:preview WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id, 'preview'=>$content]);

$_SESSION['success'] = 'News successfully updated!';
header('location:news_list.php');
}
else{
$_SESSION['error'] = 'Could not update the news!';
header('location:index.php');
}
?>
