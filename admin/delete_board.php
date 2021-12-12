<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];
$photo = $_POST['photo'];
//delete previous photo
$pic_del = 'includes/board/'.$photo;
unlink($pic_del);

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM board WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'Board member successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the board member!';
header('location:index.php');
}
?>
