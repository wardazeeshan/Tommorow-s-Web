<?php
// Start session to maintain user session data
session_start();
// Include the file to establish database connection
include 'connect.php';
?>
<!DOCTYPE html> <!-- Declares the document type and version of HTML -->
<html lang="en" dir="ltr"> <!-- Root element of the HTML document -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0">
    <title>MusiCoffee</title> <!-- Title of the webpage -->
    <!-- Linking the Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Linking an external CSS file named "style1.css" -->
    <link rel="stylesheet" type="text/css" href="nav.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="home.php">MusiCoffee</a>
            </div> <!--for logo-->

            <nav class="navbar">
                <a href="menu.php">Menu</a>
                <a href="product.php">Products</a>
                <a href="blog.php">Reviews</a>
                <a href="music.php">Songs</a>
                <button><a href="profile.php">Profile</a></button>
            </nav>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>
            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here">
                <label for="search-box" class="fas fa-search"></label>
            </div>
        </div>
    </header>
    <!-- Including external JavaScript file -->
    <script src="script.js"></script>
</body>
</html>
