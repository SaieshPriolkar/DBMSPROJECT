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
      <form method="POST" class="w-full" >
          <button type="submit" name="logout" class="menu-button bg-red-500 text-white p-2 rounded-md w-full hover:bg-red-600">Logout</button>
      </form>
    </nav>  
    <div class="flex flex-col items-center justify-center w-full p-4 bg-blue-200">
    <div class="w-full max-w-md bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold text-center mb-4 text-blue-700">BOOK</h2>
        
        <!-- Name Field -->
        <label class="block text-gray-700 font-semibold mb-1">Name:</label>
        <input type="text" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name">

        <!-- Email Field -->
        <label class="block text-gray-700 font-semibold mb-1">Email:</label>
        <input type="email" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">

        <!-- Destination Field -->
        <label class="block text-gray-700 font-semibold mb-1">Destination:</label>
        <input type="text" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter destination">

        <!-- Start Date Field -->
        <label class="block text-gray-700 font-semibold mb-2">Start:</label>
        <input type="date" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <!-- End Date Field -->
        <label class="block text-gray-700 font-semibold mb-2">End:</label>
        <input type="date" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <!-- Number of Travelers Field -->
        <label class="block text-gray-700 font-semibold mb-1">No. of Travelers:</label>
        <input type="number" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter number of travelers">

        <!-- Mode Field -->
        <label class="block text-gray-700 font-semibold mb-1">Mode:</label>
        <input type="text" class="w-full px-3 py-1 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter mode of travel">

        <!-- Book Button -->
        <button class="w-full bg-red-500 text-white font-bold py-2 rounded-lg hover:bg-orange-600">Book</button>
    </div>
</div>
    </div>
  </div>
</body>
</html>