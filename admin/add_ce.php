<?php
include 'includes/session.php';
if(isset($_POST['civic'])){
$head = $_POST['head'];
$content = $_POST['content'];

$conn = $pdo->open();
$stmt = $conn->prepare("INSERT INTO civic_engagement (head, content) VALUES (:head, :content)");
$stmt->execute(['head'=>$head, 'content'=>$content]);

$_SESSION['success'] = 'Civic Engagement content successfully added!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not add Civic Engagement content!';
header('location:index.php');
}
?>
