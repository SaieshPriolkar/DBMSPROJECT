<?php
//TABLE DISPLAY PAGE 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdbms";

$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM  USERINFO";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($con)); 
}

// LOGOUT CODE 
// Check if the logout action has been requested
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to homepage
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Hub</title>
  <link rel="stylesheet" href="Homepage.css">
</head>
<body>
  <div class="header">
    <h1>TRAVEL HUB</h1>
  </div>
  <div class="container">
    <nav class="sidebar">
      <button class="menu-button active">Home</button>
      <button class="menu-button">Book</button>
      <button class="menu-button">Cancel</button>
      <button class="menu-button">Change</button>
      <form method="POST" style="display: inline;">
          <button type="submit" name="logout" class="menu-button">Logout</button>
      </form>
    </nav>
    <div class="content">
      <h2>HELLO</h2>
    </div>
    
  </div>

</body>
</html>
