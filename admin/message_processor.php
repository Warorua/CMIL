<?php
include 'includes/session.php';

if(isset($_POST['delbl'])){
$message = $_POST['message'];
$pass = $_POST['pass'];

$conn = $pdo->open();
$stmt = $conn->prepare("DELETE FROM message WHERE id=:id");
$stmt->execute(['id'=>$message]);

$_SESSION['success'] = 'You have successfully deleted the message!';
header('location:message.php?pass='.$pass);

}
else{
$_SESSION['error'] = 'An error occurred while trying to delete the message!';
header('location:message.php?pass='.$pass);
}
?>
