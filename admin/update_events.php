<?php
include 'includes/session.php';
if(isset($_POST['events'])){
$head = $_POST['head'];
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE events SET head=:head, content=:content, brief=:brief WHERE id=:id");
$stmt->execute(['head'=>$head, 'content'=>$content, 'id'=>$id, 'brief'=>$content]);

$_SESSION['success'] = 'UNESCO events successfully updated!';
header('location:events_list.php');
}
else{
$_SESSION['error'] = 'Could not update the UNESCO events!';
header('location:index.php');
}
?>
