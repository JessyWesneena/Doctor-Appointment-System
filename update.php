<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];

$sql = "UPDATE appointments SET 
name='$name',
email='$email',
phone='$phone',
doctor='$doctor',
date='$date'
WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: view.php");
} else {
    echo "Error updating record";
}
?>
