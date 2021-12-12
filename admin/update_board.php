<?php
include 'includes/session.php';
if(isset($_POST['board'])){
$name = $_POST['name'];
$rank = $_POST['rank'];
$info = $_POST['info'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE board SET name=:name, rank=:rank, info=:info WHERE id=:id");
$stmt->execute(['name'=>$name, 'rank'=>$rank, 'info'=>$info, 'id'=>$id]);

$_SESSION['success'] = 'Board member successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update the board member!';
header('location:index.php');
}
?>
