<?php
include 'includes/session.php';
if(isset($_POST['events'])){
$head = $_POST['head'];
$content = $_POST['content'];
$name = $_POST['auth'];
$date = date("d M Y");
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
$stmt = $conn->prepare("INSERT INTO events (head, content, photo, date, name, brief) VALUES (:head, :content, :photo, :date, :name, :brief)");
$stmt->execute(['head'=>$head, 'content'=>$content, 'photo'=>$filehead, 'date'=>$date, 'name'=>$name, 'brief'=>$content]);

$_SESSION['success'] = 'UNESCO Events successfully added!';
header('location:events_list.php');
}
else{
$_SESSION['error'] = 'Could not add to UNESCO Events!';
header('location:index.php');
}
?>
