<?php
include 'includes/session.php';
if(isset($_POST['what_we_do_photo'])){
$date = date("Y/m/d | h:i:sa");
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
$stmt = $conn->prepare("INSERT INTO what_we_do_photo (date, photo) VALUES (:date, :photo)");
$stmt->execute(['date'=>$date, 'photo'=>$filename]);

$_SESSION['success'] = 'Photo has been successfully added to the database!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the photo to the database!';
header('location:index.php');
}
?>
