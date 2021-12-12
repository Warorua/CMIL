<?php
include 'includes/session.php';
if(isset($_POST['mil_africa'])){
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
$stmt = $conn->prepare("UPDATE mil_africa SET photo=:photo WHERE id=:id");
$stmt->execute(['photo'=>$filename, 'id'=>$id]);

$_SESSION['success'] = 'MIL in Africa photo successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update the MIL in Africa photo!';
header('location:index.php');
}
?>
