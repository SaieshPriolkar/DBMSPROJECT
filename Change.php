<?php
// TABLE DISPLAY PAGE 
session_start();
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
  $BookingDetailsNo = $_POST['booking_detail_id'];
  $BookingNo = $_POST['BookingNo'];
  $Destination=$_POST['Destination'];
  $Start=$_POST['Start_Date'];
  $End=$_POST['End_Date'];
  $Seats=$_POST['Seats'];
  $Mode=$_POST['Mode'];
  $sql = "UPDATE TRAVELER 
         NATURAL JOIN DESTINATION 
         NATURAL JOIN TRANSPORT 
         NATURAL JOIN BOOKINGDETAILS 
        SET `Destination` = '$Destination', 
            `Start_Date` = '$Start', 
            `End_Date` = '$End', 
            `Seats` = '$Seats', 
            `Mode` = '$Mode', 
            `total_price` = '$Seats' * (
                (SELECT priceperperson FROM Destination WHERE Destination = '$Destination') + 
                (SELECT Ticketperperson FROM Transport WHERE Mode = '$Mode')
            ) 
        WHERE `booking_detail_id` = $BookingDetailsNo 
        AND `BookingNo` = $BookingNo";

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
      <button class="menu-button bg-red-500 text-white font-bold p-2 rounded-md w-full mb-2 hover:bg-red-600 border-2 border-transparent active:border-black" onclick="location.href='Plans.php'">Plans</button>
      <form method="POST" class="w-full" >
          <button type="submit" name="logout" class="menu-button bg-red-500 text-white p-2 rounded-md w-full hover:bg-red-600">Logout</button>
      </form>
    </nav>  
    <div class="flex flex-col items-center justify-center w-full p-4 bg-blue-200">
    <div class="w-full max-w-md  bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-center mb-4 text-blue-700">CHANGE</h2>
        
        <!-- Book Form -->
        <form method="POST" action="">
        <label class="block text-gray-700 font-semibold mb-1">Booking Detail ID:</label>
        <input type="number" name="booking_detail_id" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Booking Detail ID" required>

             <label class="block text-gray-700 font-semibold mb-1">Booking No:</label>
             <input type="number" name="BookingNo" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Booking No" required>
         
            <!-- Destination Field -->
            <label class="block text-gray-700 font-semibold mb-1">Destination:</label>
            <input type="text" name="Destination" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter destination" required>

            <!-- Start Date Field -->
            <label class="block text-gray-700 font-semibold mb-2">Start:</label>
            <input type="date" name="Start_Date" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

            <!-- End Date Field -->
            <label class="block text-gray-700 font-semibold mb-2">End:</label>
            <input type="date" name="End_Date" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

            <!-- Number of Travelers Field -->
            <label class="block text-gray-700 font-semibold mb-1">No. of Travelers:</label>
            <input type="number" name="Seats" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter number of travelers" required>

            <!-- Mode Field -->
            <label class="block text-gray-700 font-semibold mb-1">Mode:</label>
            <input type="text" name="Mode" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter mode of travel" required>

            <!-- Book Button -->
            <button type="submit" class="w-full bg-red-500 text-white font-bold py-2 rounded-lg hover:bg-orange-600">Change</button>
        </form>
        <?php if ($submitted): ?>
            <p class="text-green-600 text-center mt-4">Change done  successfully!</p>
        <?php endif; ?>
    </div>
    </div>
    </div>
  </div>
</body>
</html>