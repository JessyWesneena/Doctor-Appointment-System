<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #ff9a9e, #fad0c4);">

<div class="container mt-5">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center text-danger mb-4">Book Appointment</h2>

        <form action="insert.php" method="POST">

            <input type="text" name="name" class="form-control mb-3" placeholder="Enter Name" required>

            <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>

            <input type="text" name="phone" class="form-control mb-3" placeholder="Enter Phone" required>

            <select name="doctor" class="form-control mb-3">
                <option>Dr. Smith</option>
                <option>Dr. John</option>
                <option>Dr. Rao</option>
            </select>

            <input type="date" name="date" class="form-control mb-3" required>

            <button class="btn btn-danger w-100">Book Appointment</button>

        </form>
    </div>
</div>

</body>
</html>
