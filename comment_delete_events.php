<?php
include 'includes/session.php';

if(isset($_POST['comment_del'])){

$id = $_POST['id'];
$blog = $_POST['blog'];


$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM comments WHERE id=:id");
$stmt->execute(['id'=>$id]);

$stmt = $conn->prepare("DELETE FROM reply WHERE comment=:comment");
$stmt->execute(['comment'=>$id]);

$_SESSION['comment'] = $blog;
header("location: full_events.php");

}
else{
header('location:events.php');
}
?>
