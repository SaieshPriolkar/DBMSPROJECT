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
  <div class="flex h-screen">
    <nav class="bg-blue-500 w-64 p-4 flex flex-col items-center">
    <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Homepage.php'">Home</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Book.php'">Book</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Cancel.php'">Cancel</button>
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Change.php'">Change</button>
      <form method="POST" class="w-full">
          <button type="submit" name="logout" class="menu-button bg-red-500 text-white p-2 rounded-md w-full hover:bg-red-600">Logout</button>
      </form>
    </nav>
    <div class="flex-grow p-6  bg-blue-200">
    <div class="w-full max-w-md bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-center mb-4 text-blue-700">Cancel</h2>
        <form method="POST" action="">
            <label class="block text-gray-700 font-semibold mb-1">Booking Details: </label>
            <input type="text" name="Name" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name" required>

            <label class="block text-gray-700 font-semibold mb-1">Booking No: </label>
            <input type="email" name="Email" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" required>
            
            <button type="submit" class="w-full bg-red-500 text-white font-bold py-2 rounded-lg hover:bg-orange-600">Delete</button>
        </form>

      <table class="min-w-full bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg">
        <thead>
          <tr class="bg-gray-700">
            <th class="py-3 px-4 border-b border-gray-600">BookingNo</th>
            <th class="py-3 px-4 border-b border-gray-600">Name</th>
            <th class="py-3 px-4 border-b border-gray-600">Email</th>
            <th class="py-3 px-4 border-b border-gray-600">Destination</th>
            <th class="py-3 px-4 border-b border-gray-600">Start Date</th>
            <th class="py-3 px-4 border-b border-gray-600">End Date</th>
            <th class="py-3 px-4 border-b border-gray-600">Seats</th>
            <th class="py-3 px-4 border-b border-gray-600">Mode</th>
            <th class="py-3 px-4 border-b border-gray-600">Price/person</th>
            <th class="py-3 px-4 border-b border-gray-600">Ticket/person</th>
            <th class="py-3 px-4 border-b border-gray-600">Priceid</th>
            <th class="py-3 px-4 border-b border-gray-600">Total</th>
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

          $sql = "SELECT * FROM TRAVELER NATURAL JOIN DESTINATION NATURAL JOIN TRANSPORT NATURAL JOIN BOOKINGDETAILS";
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr class='hover:bg-gray-600'>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['BookingNo']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Name']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Email']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Destination']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Start_Date']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['End_Date']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Seats']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Mode']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['priceperperson']) . "</td>
                          <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['Ticketperperson']) . "</td>
                           <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['booking_detail_id']) . "</td>
                           <td class='py-2 px-4 border-b border-gray-600'>" . htmlspecialchars($row['total_price']) . "</td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='9' class='text-center py-2'>No records found</td></tr>";
          }
          $con->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
