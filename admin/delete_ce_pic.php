<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
$id = $_POST['id'];
$photo = $_POST['photo'];
//delete previous photo
$pic_del = 'includes/gallery/'.$photo;
unlink($pic_del);

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM civic_engagement_photo WHERE id=:id");
$stmt->execute(['id'=>$id]);

$_SESSION['success'] = 'Photo has been successfully deleted from the Civic Engagement Photos';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not delete the photo from the Civic Engagement Photos!';
header('location:index.php');
}
?>
