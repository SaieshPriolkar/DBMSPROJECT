<?php
// TABLE DISPLAY PAGE 
session_start();
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
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="bg-blue-600 p-6">
    <h1 class="text-white text-3xl font-bold text-center">TRAVEL HUB</h1>
  </div>
  <div class="flex h-screen bg-blue-200">
    <nav class="bg-blue-500 w-64 p-4 flex flex-col items-center">
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Homepage.php'">Home</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Book.php'">Book</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Cancel.php'">Cancel</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Change.php'">Change</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Plans.php'">Plans</button>
      <form method="POST" class="w-full">
          <button type="submit" name="logout" class="menu-button bg-red-500 text-white p-2 rounded-md w-full hover:bg-red-600">Logout</button>
      </form>
    </nav>
   <div class="mx-10">
   <div class="mb-10">
     <h2 class="text-black text-2xl font-bold">Destination Plans</h2>
     </div>
     <div class ="flex justify-center">
     <table class=" w=1/3 bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg text-sm mx-auto">
        <thead>
          <tr class="bg-gray-700 text-xs">
            <th class="w=1/4 py-1 px-2 border-b border-gray-600">Destination</th>
            <th class="w=1/4 py-1 px-2 border-b border-gray-600">Price for Destination</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "projectdbms";
          $con = new mysqli($servername, $username, $password, $dbname);

          if ($con->connect_error) {
              die("Connection failed: " . $con->connect_error);
          }

          $sqlD = "SELECT * FROM destination";
          $resultD = $con->query($sqlD);
          if (!$resultD) {
              echo "Error: " . $con->error;
          }
          if ($resultD->num_rows > 0) {
              while ($rowD = mysqli_fetch_assoc($resultD)) {
                  echo "<tr class='hover:bg-gray-600'>
                          <td class='w=1/4 py-1 px-2 border-b border-gray-600'>" . htmlspecialchars($rowD['Destination']) . "</td>
                          <td class='w=1/4 py-1 px-2 border-b border-gray-600'>" . htmlspecialchars($rowD['priceperperson']) . "</td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='2' class='text-center py-1'>No records found</td></tr>";
          }
          ?>
        </tbody>
     </table>
   </div>
   </div>
     <div class="mx-10">
     <div class="mb-10">
     <h2 class="text-black text-2xl font-bold">Transport Plans</h2>
     </div>
     <div class ="flex justify-center">
     <table class=" w=1/3 bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg text-sm mx-auto">
        <thead>
          <tr class="bg-gray-700 text-xs">
            <th class="w=1/4 py-1 px-2 border-b border-gray-600">Transport</th>
            <th class="w=1/4 py-1 px-2 border-b border-gray-600">Price for Transport</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sqlT = "SELECT * FROM transport";
          $resultT = $con->query($sqlT);
          if (!$resultT) {
              echo "Error: " . $con->error;
          }
          if ($resultT->num_rows > 0) {
              while ($rowT = mysqli_fetch_assoc($resultT)) {
                  echo "<tr class='hover:bg-gray-600'>
                          <td class='w=1/4 py-1 px-2 border-b border-gray-600'>" . htmlspecialchars($rowT['Mode']) . "</td>
                          <td class='w=1/4 py-1 px-2 border-b border-gray-600'>" . htmlspecialchars($rowT['Ticketperperson']) . "</td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='2' class='text-center py-1'>No records found</td></tr>";
          }
          ?>
        </tbody>
     </table>
     </div>
  </div>
</body>
</html>