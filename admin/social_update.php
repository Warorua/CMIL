<?php
include 'includes/session.php';

if(isset($_POST['social'])){

$facebook = $_POST['facebook'];
$whatsapp = $_POST['whatsapp'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$linkedln = $_POST['linkedln'];

$conn = $pdo->open();
$stmt = $conn->prepare("UPDATE social SET facebook=:facebook, whatsapp=:whatsapp, twitter=:twitter, instagram=:instagram, linkedln=:linkedln WHERE id=1");
$stmt->execute(['facebook'=>$facebook, 'whatsapp'=>$whatsapp, 'twitter'=>$twitter, 'instagram'=>$instagram, 'linkedln'=>$linkedln]);

$_SESSION['success'] = 'Social links information updated successfully!';
header('location:index.php');
}
else{
$_SESSION['error'] = 'An error occured while updating the Social links! Try again!';
header('location:index.php');
}
?>
