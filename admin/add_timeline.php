<?php
include 'includes/session.php';
if(isset($_POST['timeline'])){
$head = $_POST['head'];
$content = $_POST['content'];
$date = date("M d, Y");
//photo photo
$photo = $_FILES['photo']['name'];
$photo_path = realpath($_FILES['photo']['name']);
$ext = pathinfo($photo, PATHINFO_EXTENSION);
$slugg = md5($head);
$time_id = time();
$the_id = sha1($time_id);
$new_filehead = $the_id.$slugg.'.'.$ext;
move_uploaded_file($_FILES['photo']['tmp_name'], 'includes/gallery/'.$new_filehead);
$filehead = $new_filehead;

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO timeline (head, content, photo, date) VALUES (:head, :content, :photo, :date)");
$stmt->execute(['head'=>$head, 'content'=>$content, 'photo'=>$filehead, 'date'=>$date]);

$_SESSION['success'] = 'Timeline successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add into Timeline!';
header('location:index.php');
}
?>
