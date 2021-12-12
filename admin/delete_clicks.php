<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];
$photo = $_POST['photo'];
//delete previous photo
$pic_del = 'includes/gallery/'.$photo;
unlink($pic_del);

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM clicks WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'UNESCO MIL clicks successfully deleted';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the UNESCO MIL clicks!';
header('location:index.php');
}
?>
