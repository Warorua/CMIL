<?php
include 'includes/session.php';
if(isset($_POST['trustee'])){
$name = $_POST['name'];
$info = $_POST['info'];

//photo photo
$photo = $_FILES['photo']['name'];
$photo_path = realpath($_FILES['photo']['name']);
$ext = pathinfo($photo, PATHINFO_EXTENSION);
$slugg = md5($name);
$time_id = time();
$the_id = sha1($time_id);
$new_filename = $the_id.$slugg.'.'.$ext;
move_uploaded_file($_FILES['photo']['tmp_name'], 'includes/trustee/'.$new_filename);
$filename = $new_filename;

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO trustee (name, info, photo) VALUES (:name, :info, :photo)");
$stmt->execute(['name'=>$name, 'info'=>$info, 'photo'=>$filename]);

$_SESSION['success'] = 'Trustee member successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the trustee member!';
header('location:index.php');
}
?>
