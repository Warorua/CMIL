<?php
include 'includes/session.php';
if(isset($_POST['what_we_do'])){
$head = $_POST['head'];
$content = $_POST['content'];

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO what_we_do (head, content) VALUES (:head, :content)");
$stmt->execute(['head'=>$head, 'content'=>$content]);

$_SESSION['success'] = 'what_we_do content successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the what_we_do content!';
header('location:index.php');
}
?>
