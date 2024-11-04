<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdbms";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$submitted = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the username and password match
    $sql = "SELECT * FROM `USERINFO` WHERE `Username` = '$username' AND `Password` = '$password'";
    $result = $con->query($sql);

    if ($result && $result->num_rows == 1) {
        // Successful login
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirect to dashboard (you can customize the path as needed)
        echo "<script>
                window.location.href = 'Homepage.php';
              </script>";
    } else {
        // Display error if login fails
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invalid credentials.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Travel Hub</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="header">
    <h1>Travel Hub</h1>
  </div>
  
  <div class="main">
    <div class="login-form">
      <h2>Login</h2>
      <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" class="button">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
