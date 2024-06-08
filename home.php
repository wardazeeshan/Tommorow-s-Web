<?php
include 'connect.php';
include 'nav.php';
$url = 'https://fake-coffee-api.vercel.app/api';
$response = file_get_contents($url);
$data = json_decode($response, true); // Decode the JSON into an associative array

// Extract the first 6 products
$products = array_slice($data, 0, 6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="home.css"> <!--css for styling the home page-->
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<div class="cover">
    <div class="heading">
        <h1>MUSICOFFEE</h1>
    </div>
    <div class="extra-txt">
        <p>
        Welcome to MusiCoffee!<br>Enjoy delicious coffee in a cozy setting with live music and great playlists. 
        <br>MusicCoffee is where coffee and music come together perfectly.
        </p>
    </div>
    <div class="button-container">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
            <button class="btn"><a href="order.php">Order now.</a></button>
        <?php else: ?>
            <a href="#about"><button class="btn">About Us.</button></a> 
        <?php endif; ?>
    </div>
</div>
<br>
<!-----------------main section ends-------------------->
<scetion id="about">
<div class="exploring">
    <div class="heading2">
        <h1>Your coffee experts are here to save the day.</h1>
    </div>
    <div class="para">
        <p>
        At MusicCoffee, we blend the love of coffee with the joy of music.<br>
        Our online cafe offers a delightful selection of freshly brewed coffee, paired with curated playlists and live music streams. 
        <br>Whether you're relaxing at home or working on the go, MusicCoffee brings the perfect harmony of taste and sound to your day. 
        <br>Join us for a unique experience where coffee and music unite.
        </p>
    </div>
    <div class="button">
        <button class="btn2"><a href="menu.php">See Menu.</a></button>
    </div>
</div> 
</scetion>

<!------------------section ends-------------------------->   
<br>
<div class="prod-sec">
    <div class="head2">
        <h1>Trending Products</h1>
    </div>
    <div class="product-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <strong><?= $product['name']; ?></strong>
                <div class="product-images">
                    <img src="<?= $product['image_url']; ?>" alt="<?= $product['name']; ?>">
                </div>
                <p class="product-details">
                    <?= $product['description']; ?><br><br>
                    Price: $<?= $product['price']; ?><br>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="view-more">
    <button><a href="product.php">View More Products</a></button>
    </div>
</div>
<!--FOOTER SECTION-->
<div class="footer">
    <div class="shar">
        <a href="#" class="fab fa-facebook"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
    </div>
    <div class="links">
        <a href="home.php">Home</a>
        <a href="#about">About Us</a>
        <a href="menu.php">Menu</a>
        <a href="product.php">Products</a>
        <a href="blog.php">Reviews</a>
    </div>
    <div class="credits">
        Created by <span>Warda Zeeshan</span> || all rights rerved.
    </div>
</div>
<!--FOOTER SECTION-->
<script src="script.js"></script>
</body>
</html>
