<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];
$photo = $_POST['photo'];
//delete previous photo
$pic_del = 'includes/gallery/'.$photo;
unlink($pic_del);

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM events WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'UNESCO events successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the UNESCO events!';
header('location:index.php');
}
?>
