<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: view.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
