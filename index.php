<?php
include 'service/database.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yuda Pradana - Misi 4</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/16927.jpg');">
    <div class="bg-white bg-opacity-80 rounded-xl shadow-lg p-8 max-w-md w-full text-center">
      <h1 class="text-3xl font-bold mb-4 text-gray-800">Selamat Datang</h1>
      <p class="text-lg text-gray-600 mb-6">di halaman <span class="font-semibold text-blue-600">Misi 4</span>, <span class="font-semibold text-gray-800">Yuda Pradana</span></p>
      <div class="flex flex-col gap-4">
        <a href="login.php" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Login</a>
        <a href="register.php" class="w-full py-2 px-4 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Register</a>
      </div>
    </div>
  </body>
</html>
