<?php
include 'includes/session.php';
if(isset($_POST['trustee'])){
$name = $_POST['name'];
$info = $_POST['info'];
$id = $_POST['id'];


$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE trustee SET name=:name, info=:info WHERE id=:id");
$stmt->execute(['name'=>$name, 'info'=>$info, 'id'=>$id]);

$_SESSION['success'] = 'trustee member successfully updated!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'Could not update the trustee member!';
header('location:index.php');
}
?>
