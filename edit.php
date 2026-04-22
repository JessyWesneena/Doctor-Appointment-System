<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM appointments WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
</head>
<body>

<h2>Edit Appointment</h2>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

Name:<br>
<input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

Email:<br>
<input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

Phone:<br>
<input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

Doctor:<br>
<input type="text" name="doctor" value="<?php echo $row['doctor']; ?>"><br><br>

Date:<br>
<input type="date" name="date" value="<?php echo $row['date']; ?>"><br><br>

<button type="submit">Update</button>

</form>

</body>
</html>
