<?php
include 'includes/session.php';

if(isset($_POST['comment'])){

$user = $_POST['user'];
$head = $_POST['head'];
$content = $_POST['content'];
$site = $_POST['site'];
$page = $_POST['page'];
$title = $_POST['title'];

$date = date('d M Y');

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO comments (user, site, head, content, date, title, page) VALUES (:user, :site, :head, :content, :date, :title, :page)");
$stmt->execute(['user'=>$user, 'site'=>$site, 'head'=>$head, 'content'=>$content, 'date'=>$date, 'title'=>$title, 'page'=>$page]);
$_SESSION['success'] = 'Your comment has been successfully posted';
if($page == 'blog'){
header("location:blog.php");
}
elseif($page == 'kenmil'){
    header("location: kenmil.php");
}
else{
header("location:events.php");
}
}
else{
$_SESSION['comment'] = $title;
$_SESSION['error'] = 'There was a problem posting your comment!';
header("location: index.php");
}
?>
