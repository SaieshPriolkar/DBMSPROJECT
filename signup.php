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
    <div class="signup-form">
    <h2>Sign Up</h2>
    <form  action="do-later.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit" class="button">Sign Up</button>
    </form>
    </div>
  </div>
</body>
</html>
