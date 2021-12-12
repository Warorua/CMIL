<?php
include 'includes/session.php';
if(isset($_POST['blog'])){
$head = $_POST['head'];
$content = $_POST['content'];
$date = date("M d, Y");
$user = $_SESSION['admin'];
$name = $_POST['name'];

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
$stmt = $conn->prepare("INSERT INTO blog (head, content, photo, name, user, date, brief) VALUES (:head, :content, :photo, :name, :user, :date, :brief)");
$stmt->execute(['head'=>$head, 'content'=>$content, 'photo'=>$filehead, 'name'=>$name, 'user'=>$user, 'date'=>$date, 'brief'=>$content]);

$_SESSION['success'] = 'CMIL Blog successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add to CMIL Blog!';
header('location:index.php');
}
?>
