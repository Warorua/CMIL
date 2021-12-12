<?php
include 'includes/session.php';

if(isset($_POST['upraise'])){
$date = date("d M Y");
$user = $_POST['admin'];
$comment = $_POST['comment'];
$content = $_POST['content'];
$commenter = $_POST['commenter'];
$pass = $_POST['pass'];

$conn = $pdo->open();

$stmt = $conn->prepare("UPDATE comments SET upraise=1 WHERE id=:id");
$stmt->execute(['id'=>$comment]);

//check points of the commenter
$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$commenter]);
$p1 = $stmt->fetch();
$points = $p1['points'] + 25;

//gift the commenter reply points
$stmt = $conn->prepare("UPDATE users SET points=:points WHERE id=:id");
$stmt->execute(['id'=>$commenter, 'points'=>$points]);



$_SESSION['success'] = 'Comment successfully upraised';

header("location:comment.php?pass=".$pass);
}


if(isset($_POST['delete'])){
$comment = $_POST['comment'];
$pass = $_POST['pass'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM comments WHERE id=:id");
$stmt->execute(['id'=>$comment]);

$stmt = $conn->prepare("DELETE FROM reply WHERE comment=:comment");
$stmt->execute(['comment'=>$comment]);

$_SESSION['success'] = 'Comment successfully deleted';

header("location:index.php");
}


if(isset($_POST['delbl'])){
$date = date("d M Y");
$user = $_POST['admin'];
$comment = $_POST['comment'];
$content = $_POST['content'];
$commenter = $_POST['commenter'];
$pass = $_POST['pass'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM comments WHERE id=:id");
$stmt->execute(['id'=>$comment]);

$stmt = $conn->prepare("DELETE FROM reply WHERE comment=:comment");
$stmt->execute(['comment'=>$comment]);

$stmt = $conn->prepare("UPDATE users SET status=403 WHERE id=:id");
$stmt->execute(['id'=>$commenter]);

$_SESSION['success'] = 'Comment successfully deleted';

header("location:index.php");
}

if(!isset($_POST['upraise'])&&!isset($_POST['delete'])&&!isset($_POST['delbl'])){
$_SESSION['error'] = 'An error occured while processing your request!';
header('location:index.php');
}
?>
