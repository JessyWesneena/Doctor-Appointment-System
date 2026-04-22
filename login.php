<?php
session_start();
include 'db.php';

// If already logged in, redirect
if (isset($_SESSION['admin'])) {
    header("Location: view.php");
    exit();
}

if(isset($_POST['login'])) {

    // Get form data safely
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;

        // Redirect after login
        header("Location: view.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to right, #667eea, #764ba2);">

<div class="container mt-5">
    <div class="col-md-4 mx-auto">
        <div class="card p-4 shadow-lg">

            <h3 class="text-center mb-3">Admin Login</h3>

            <?php if(isset($error)) { ?>
                <div class="alert alert-danger text-center">
                    <?= $error; ?>
                </div>
            <?php } ?>

            <form method="POST">
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                <button type="submit" name="login" class="btn btn-dark w-100">Login</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
