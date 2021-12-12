<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];
$photo = $_POST['photo'];
//delete previous photo
$pic_del = 'includes/gallery/'.$photo;
unlink($pic_del);

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM gallery WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'Photo has been successfully deleted from the gallery';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the photo from the gallery!';
header('location:index.php');
}
?>
