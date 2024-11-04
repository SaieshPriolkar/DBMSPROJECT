<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdbms";
$port = 3306;

// Establish a database connection
$con = new mysqli($servername, $username, $password, $dbname, $port);

// Check for connection errors
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize inputs and hash password
  $Username = mysqli_real_escape_string($con, trim($_POST['username']));
  $email = mysqli_real_escape_string($con, trim($_POST['email']));
  $Password = mysqli_real_escape_string($con, trim($_POST['password']));
  $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

  // Prepare SQL with placeholders
  $stmt = $con->prepare("INSERT INTO `USERINFO` (`Username`, `emailid`, `Password`) VALUES (?, ?, ?)");

  if ($stmt === false) {
    echo "Failed to prepare statement: " . htmlspecialchars($con->error);
    exit();
  }

  // Bind the parameters
  $stmt->bind_param("sss", $Username, $email, $hashedPassword);

  // Execute the statement
  if ($stmt->execute()) {
    $submitted = true;
  } else {
    // Check for duplicate entry error
    if ($con->errno === 1062) {
      echo "Error: Duplicate entry. The username or email already exists.";
    } else {
      echo "Error executing statement: " . htmlspecialchars($stmt->error);
    }
  }

  $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Travel Hub</title>
  <link rel="stylesheet" href="signuppage.css">
</head>
<body>

  <div class="header">
    <h1>Travel Hub</h1>
  </div>
  <div class="main">
        <?php if ($submitted): ?>
            <div style="display: flex; justify-content: center">
                <h4>Signup Successful!</h4>
            </div>
        <?php endif; ?>
    <div class="signup-form">
    <h2>Sign Up</h2>
    <form action="" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit" class="button">Sign Up</button>
    </form>
    <a href="index.php" class="button">Back</a>
    </div>
  </div>
</body>
</html>
