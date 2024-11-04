<?php
$servername="localhost";
$username="root";
$password="";
$dbname="projectdbms";
$con= new mysqli($servername,$username,$password,$dbname);
 
if(!$con){
  die("Connection failed: ". mysqli_connect_error());
}
$submitted=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $Username=$_POST['username'];
  $email=$_POST['email'];
  $Password=$_POST['password'];
  $sql="INSERT INTO USERINFO(username,emailid,password) VALUES ('$Username','$email','$Password')";

if($con->query($sql) === TRUE){
  $submitted = true; // Set to true on successful submission
}
else{
  echo "Error: " . $sql . "<br>" . $con->error;
}}

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
      <button type="Back" class="button" onclick="window.location.href='index.php'">Back</button>
    </form>
    </div>
  </div>
</body>
</html>
