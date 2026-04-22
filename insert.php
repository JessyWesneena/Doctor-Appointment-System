<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];

$sql = "INSERT INTO appointments (name, email, phone, doctor, date)
VALUES ('$name', '$email', '$phone', '$doctor', '$date')";

$success = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointment Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #43cea2, #185a9d);">

<div class="container mt-5">
    <div class="card p-5 text-center shadow-lg">

        <?php if($success) { ?>

            <h2 class="text-success mb-3">✅ Appointment Booked Successfully!</h2>

            <p><b>Name:</b> <?php echo $name; ?></p>
            <p><b>Doctor:</b> <?php echo $doctor; ?></p>
            <p><b>Date:</b> <?php echo $date; ?></p>

            <a href="book.php" class="btn btn-primary m-2">Book Another</a>
            <a href="view.php" class="btn btn-success m-2">View Appointments</a>

        <?php } else { ?>

            <h2 class="text-danger">❌ Error Booking Appointment</h2>
            <p><?php echo mysqli_error($conn); ?></p>

            <a href="book.php" class="btn btn-danger mt-3">Try Again</a>

        <?php } ?>

    </div>
</div>

</body>
</html>

