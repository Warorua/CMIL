<?php
include 'includes/session.php';
if(isset($_POST['global'])){
$content = $_POST['content'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE global SET content=:content WHERE id=:id");
$stmt->execute(['content'=>$content, 'id'=>$id]);

$_SESSION['success'] = 'Global MIL Content successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update Global MIL Content!';
header('location:index.php');
}
?>
