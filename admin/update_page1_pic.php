<?php
include 'includes/session.php';
if(isset($_POST['mil'])){
$id = $_POST['id'];
$prev_pic = $_POST['pic'];
//delete previous photo
$pic_del = 'includes/gallery/'.$prev_pic;
unlink($pic_del);
$name = time();
//photo photo
$photo = $_FILES['photo']['name'];
$photo_path = realpath($_FILES['photo']['name']);
$ext = pathinfo($photo, PATHINFO_EXTENSION);
$slugg = md5($name);
$time_id = time();
$the_id = sha1($time_id);
$new_filename = $the_id.$slugg.'.'.$ext;
move_uploaded_file($_FILES['photo']['tmp_name'], 'includes/gallery/'.$new_filename);
$filename = $new_filename;

$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE mil SET p1=:p1 WHERE id=:id");
$stmt->execute(['p1'=>$filename, 'id'=>$id]);

$_SESSION['success'] = 'Photo successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the Photo!';
header('location:index.php');
}
?>
