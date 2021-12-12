<?php
include 'includes/session.php';

if(isset($_SESSION['reply'])){

$id = $_GET['id'];
$pass =  $_GET['pass'];


$conn = $pdo->open();

$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reply WHERE id=:id");
$stmt->execute(['id'=>$id]);
$auth = $stmt->fetch();
if($auth['numrows'] > 0){
$stmt = $conn->prepare("DELETE FROM reply WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'Reply successfully deleted!';
unset($_SESSION['reply']);
header("location:comment.php?pass=".$pass);
}
else{
$_SESSION['error'] = 'Invalid reply selected!';
unset($_SESSION['reply']);
header("location:comment.php?pass=".$pass);
}

}
else{
$_SESSION['error'] = 'Malicious action detected. If problem persists logout to avoid being blocked from the site and inform the DEVELOPER ASAP!!';
header('location:index.php');
}
?>
