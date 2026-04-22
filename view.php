<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM appointments");

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #a18cd1, #fbc2eb);">

<div class="container mt-5">
    <div class="card p-4 shadow-lg">
        
        <!-- Header with Logout -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary">All Appointments</h2>
            <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>

        <table class="table table-bordered table-hover text-center">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php if(mysqli_num_rows($result) > 0) { ?>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td><?= htmlspecialchars($row['doctor']); ?></td>
                    <td><?= htmlspecialchars($row['date']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this appointment?');">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="7">No appointments found</td>
                </tr>
            <?php } ?>
        </table>

        <a href="book.php" class="btn btn-success">Book Appointment</a>

    </div>
</div>

</body>
</html>
