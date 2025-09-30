<?php 
include 'service/database.php';
session_start();

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['name'] = $data['name'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['username'] = $username;
        $_SESSION['is_logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "
        <script>
          alert('Login Failed: Invalid username or password');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login - todo</title>
    <link rel="stylesheet" href="style-login.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="screen-backdrop"></div>
      <div class="screen home">
        <div class="login-form">
          <form action="login.php" method="POST">
            <h2>Login</h2>
            <div class="form-group">
              <label for="username">Username</label>
              <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter username"
                required
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
              />
            </div>
            <button type="submit" name="login">Login</button>
<div class="register-link">
  <p>Don't have an account? <a href="register.php">Register</a></p>
</div>

        
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
