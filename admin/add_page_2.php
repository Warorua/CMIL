<?php
include 'includes/session.php';
if(isset($_POST['page_2'])){
$head = $_POST['head'];
$content = $_POST['content'];

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO mil2 (head, content) VALUES (:head, :content)");
$stmt->execute(['head'=>$head, 'content'=>$content]);

$_SESSION['success'] = 'Page 2 content successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add the Page 2 content!';
header('location:index.php');
}
?>
