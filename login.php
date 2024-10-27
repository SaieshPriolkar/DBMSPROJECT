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
      <form action="process_login.php" method="POST">
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
