<?php
session_start();

// Hardcoded credentials
$validUser = "john";
$validPass = "abc123";

// Initialize message variable
$message = "";

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST['userName'] ?? '';
    $password = $_POST['password'] ?? '';

    if (trim($userName) === $validUser && $password === $validPass) {
        $_SESSION['isLoggedIn'] = true;
        $message = "<p class='text-green-600 font-semibold text-center mb-4'>You're Logged In Successfully!</p>";
    } else {
        $message = "<p class='text-red-600 font-semibold text-center mb-4'>Sorry, my friend, wrong login!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body {
      background: url('images/pexels-altair-27103765.jpg') no-repeat center center fixed;
      background-size: cover;
  }
</style>
</head>
<body class="flex flex-col min-h-screen font-sans">

<!-- Simple Navbar -->
<nav class="w-full bg-white bg-opacity-90 shadow-md py-4">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-xl font-bold text-gray-700">My Simple App</h1>
    </div>
</nav>

<!-- Centered Login Form -->
<div class="flex flex-1 items-center justify-center">
    <div class="bg-white bg-opacity-90 p-8 rounded-xl shadow-lg w-full max-w-sm backdrop-blur-md">

        <!-- Logo/Icon -->
        <div class="flex justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3 1.343 3 3v3H9v-3c0-1.657 1.343-3 3-3zm0-7a5 5 0 00-5 5v3h10V9a5 5 0 00-5-5z"/>
            </svg>
        </div>

        <?php
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
            echo "<p class='text-green-600 font-semibold text-center mb-4'>You are logged in!</p>";
            echo "<div class='text-center'>";
            echo "<a href='logout.php' class='bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded font-semibold transition-colors'>Log Out</a>";
            echo "</div>";
        } else {
            echo $message;
        ?>

        <form method="post" class="flex flex-col gap-4">
            <input type="text" name="userName" placeholder="Username" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="password" name="password" placeholder="Password" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 rounded font-semibold transition-colors">Log In</button>
        </form>

        <?php } ?>

    </div>
</div>

</body>
</html>
