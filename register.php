<?php
include 'service/database.php';
session_start();

// If already logged in, go to dashboard
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $role     = trim($_POST['role']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Basic validation
    if ($fullname === '' || $role === '' || $username === '' || $password === '') {
        echo "<script>alert('Please fill all fields');</script>";
    } else {
        // Check existing account (prepared statement)
        $check_stmt = mysqli_prepare($db, "SELECT id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($check_stmt, "s", $username);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            echo "<script>alert('Account already exists!');</script>";
            mysqli_stmt_close($check_stmt);
        } else {
            mysqli_stmt_close($check_stmt);

            // Insert new user (prepared statement)
            $insert_stmt = mysqli_prepare($db, "INSERT INTO users (username, password, name, role) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($insert_stmt, "ssss", $username, $password, $fullname, $role);
            $ok = mysqli_stmt_execute($insert_stmt);

            if ($ok && mysqli_stmt_affected_rows($insert_stmt) > 0) {
                mysqli_stmt_close($insert_stmt);
                echo "<script>alert('Registration Successful'); window.location.href='login.php';</script>";
                exit;
            } else {
                mysqli_stmt_close($insert_stmt);
                echo "<script>alert('Registration Failed');</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - ToDo</title>
    <link rel="stylesheet" href="style-register.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="screen-backdrop"></div>
      <div class="screen home">
        <div class="register-form">
          <form action="register.php" method="POST">
            <h2>Create Account</h2>

            <div class="form-group">
              <label for="fullname">Full Name</label>
              <input
                type="text"
                id="fullname"
                name="fullname"
                placeholder="Enter your full name"
                required
              />
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input
                type="text"
                id="username"
                name="username"
                placeholder="Choose a username"
                required
              />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Create a password"
                required
              />
            </div>
            <div class="form-group">
              <label for="role">Pekerjaan</label>
              <input
                type="text"
                id="role"
                name="role"
                placeholder="Pekerjaan"
                required
              />
            </div>

            <button type="submit" name="register">Register</button>

            <div class="login-link">
              Already have an account? <a href="login.php">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
