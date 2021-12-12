<?php
include 'includes/session.php';
if(isset($_POST['page_1'])){
$head = $_POST['head'];
$content = $_POST['content'];

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
$stmt = $conn->prepare("INSERT INTO mil (head, content, p1) VALUES (:head, :content, :p1)");
$stmt->execute(['head'=>$head, 'content'=>$content, 'p1'=>$filehead]);

$_SESSION['success'] = 'Page 1 content successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the Page 1 content!';
header('location:index.php');
}
?>
