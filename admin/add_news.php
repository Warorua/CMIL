<?php
include 'includes/session.php';
if(isset($_POST['news'])){
$head = $_POST['head'];
$content = $_POST['content'];
$date = date("d");
$year = date("Y");
$month = date("M");

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
$stmt = $conn->prepare("INSERT INTO news (head, content, photo, date, month, year, preview) VALUES (:head, :content, :photo, :date, :month, :year, :preview)");
$stmt->execute(['head'=>$head, 'content'=>$content, 'photo'=>$filehead, 'date'=>$date, 'month'=>$month, 'year'=>$year, 'preview'=>$content]);

$_SESSION['success'] = 'Latest News successfully added!';
header('location:news_list.php');
}
else{
$_SESSION['error'] = 'Could not add to Latest News!';
header('location:index.php');
}
?>
