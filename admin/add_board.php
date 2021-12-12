<?php
include 'includes/session.php';
if(isset($_POST['board'])){
$name = $_POST['name'];
$rank = $_POST['rank'];
$info = $_POST['info'];

//photo photo
$photo = $_FILES['photo']['name'];
$photo_path = realpath($_FILES['photo']['name']);
$ext = pathinfo($photo, PATHINFO_EXTENSION);
$slugg = md5($name);
$time_id = time();
$the_id = sha1($time_id);
$new_filename = $the_id.$slugg.'.'.$ext;
move_uploaded_file($_FILES['photo']['tmp_name'], 'includes/board/'.$new_filename);
$filename = $new_filename;

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO board (name, rank, info, photo) VALUES (:name, :rank, :info, :photo)");
$stmt->execute(['name'=>$name, 'rank'=>$rank, 'info'=>$info, 'photo'=>$filename]);

$_SESSION['success'] = 'Board member successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the board member!';
header('location:index.php');
}
?>
