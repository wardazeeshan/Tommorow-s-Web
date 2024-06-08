<?php
// Include the file to establish database connection
include 'connect.php';
// Include navigation bar
include 'nav.php';
// URL for the fake coffee API
$url = 'https://fake-coffee-api.vercel.app/api';
// Retrieve data from the API
$response = file_get_contents($url);
// Decode the JSON response into an associative array
$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Coffee Products</title>
    <link rel="stylesheet" type="text/css" href="prods.css">
    <link rel="stylesheet" href="footer.css">
    <!-- Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<div class="box-cont">
 <div class="bg_cover"> 
        <h1>Coffee Products</h1>
    <div class="product-grid">
        <?php foreach ($data as $product): ?>
            <div class="product-card">
                <!-- Product Name -->
                <strong><?= $product['name']; ?></strong>
                <div class="product-images">
                    <!-- Product Image -->
                    <img src="<?= $product['image_url']; ?>" alt="<?= $product['name']; ?>">
                </div>
                <!-- Product Description -->
                <p class="product-details">
                    <?= $product['description']; ?><br>
                    <div class="product-price">
                        <!-- Product Price -->
                        Price: $<?= $product['price']; ?><br>
                    </div>
                    <div class="buttons">
                        <button class="view-button">
                            <!-- View Button -->
                            <span class="view-icon">👁️</span> View
                        </button>
                    </div>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>

    <!-- FOOTER SECTION -->
<section class="footer">
    <div class="shar">
        <!-- Social Media Links -->
        <a href="#" class="fab fa-facebook"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
    </div>
    <div class="links">
        <!-- Footer Links -->
        <a href="home.php">Home</a>
        <a href="music.php">Songs</a>
        <a href="menu.php">Menu</a>
        <a href="product.php">Products</a>
        <a href="blog.php">Reviews</a>
    </div>
    <div class="credits">
        <!-- Footer Credits -->
        Created by <span>Warda Zeeshan</span> || all rights reserved.
    </div>
</section>
<!-- FOOTER SECTION -->
    <!-- Including external JavaScript file -->
    <script src="product.js"></script>
</body>
</html>
