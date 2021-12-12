<?php
include 'includes/session.php';

if(isset($_POST['reply'])){
$date = date("d M Y");
$user = $_POST['admin'];
$comment = $_POST['comment'];
$content = $_POST['content'];
$commenter = $_POST['commenter'];
$pass = $_POST['pass'];

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO reply (date, user, comment, content) VALUES (:date, :user, :comment, :content)");
$stmt->execute(['date'=>$date, 'user'=>$user, 'comment'=>$comment, 'content'=>$content]);

//check points of the commenter
$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$commenter]);
$p1 = $stmt->fetch();
$points = $p1['points'] + 10;

//gift the commenter reply points
$stmt = $conn->prepare("UPDATE users SET points=:points WHERE id=:id");
$stmt->execute(['id'=>$commenter, 'points'=>$points]);



$_SESSION['success'] = 'Reply successfully saved';

header("location:comment.php?pass=".$pass);

}
else{
$_SESSION['error'] = 'Could not add reply!';
header('location:index.php');
}
?>
