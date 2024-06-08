<?php
include 'connect.php';
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="menu-head">
        <h1> Our <span>Menu</span></h1>
    </div>
    <div class="box-tainer">
        <!------------------------------------>
        <div class="box">
            <img src="images/americano coffee.jpg" alt="">
            <h3>Americano coffee</h3>
            <div class="price">$9.99</div>
            <div class="desc">
                <p>An Americano coffee is made by diluting a shot of espresso with hot water. 
                The basic ingredients are a single or double shot of espresso and hot water, with the water typically added in a 1:1 ratio or adjusted to taste.
                </p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/cappuccino.jpeg" alt="">
            <h3>Cappuccino</h3>
            <div class="price">$10.99</div>
            <div class="desc">
                <p> A cappuccino is made with equal parts of espresso, steamed milk, and milk foam. 
                    It typically starts with a single or double shot of espresso, which is then topped with an equal amount of steamed milk and finished with a thick layer of milk foam.
                </p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/dalgona coffee.jpg" alt="">
            <h3>Dalgona Coffee</h3>
            <div class="price">$12.99</div>
            <div class="desc">
                <p>
                Dalgona coffee is made by whipping equal parts of instant coffee, sugar, and hot water until it becomes creamy and frothy. 
                This coffee mixture is then spooned over a glass of cold or hot milk. 
                The result is a visually appealing and sweet coffee drink with a velvety texture on top of the milk. 
                </p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/matcha coffee.jpg" alt="">
            <h3>Matcha coffee</h3>
            <div class="price">$15.99</div>
            <div class="desc">
                <p>
                Matcha coffee is a delightful fusion of two beloved beverages: matcha green tea and coffee.
                 It typically consists of finely ground matcha powder, renowned for its vibrant green hue and health benefits, blended with a shot of espresso or brewed coffee.
                 This blend is often combined with steamed or frothed milk to create a creamy and flavorful beverage. 
                </p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/lattee.jpg" alt="">
            <h3>Latte</h3>
            <div class="price">$11.99</div>
            <div class="desc">
                <p>A latte is a classic coffee beverage crafted with a shot of espresso and steamed milk, topped with a thin layer of milk foam. 
                The ratio of espresso to steamed milk varies, but a typical latte consists of one or two shots of espresso with a larger volume of steamed milk, providing a smooth and creamy texture</p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/macchiato latte.jpeg" alt="">
            <h3>Macchiato Latte</h3>
            <div class="price">$16.99</div>
            <div class="desc">
                <p>
                A macchiato latte is a delightful variation of the traditional latte, blending the rich flavors of espresso and milk with a hint of sweetness.   
                The term "macchiato" translates to "stained" or "marked" in Italian, indicating that the espresso is "marked" with a small amount of milk.
                 In a macchiato latte, a dollop of foam or a small amount of steamed milk is added to the espresso, creating a subtle contrast in flavor and texture. 
                </p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/Caffé Breve.jpg" alt="">
            <h3>Caffé Breve</h3>
            <div class="price">$10.99</div>
            <div class="desc">
                <p>Caffè Breve is a decadent coffee drink offering rich and creamy indulgence. 
                    The espresso is brewed and combined with an equal amount of half-and-half, resulting in a creamy and indulgent coffee experience.    
                The drink can be enjoyed hot or iced, depending on personal preference.</p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/Cortadito-1.png" alt="">
            <h3>Cortadito</h3>
            <div class="price">$8.99</div>
            <div class="desc">
                <p>
                Cortadito is a delicious Cuban coffee beverage that offers a bold and sweet flavor. 
                The name "cortadito" translates to "cut" in Spanish, referring to the way the espresso is "cut" with a small amount of milk. 
                The result is a perfectly balanced drink that combines the boldness of espresso with the smoothness of steamed milk and the sweetness of sugar.
                </p>
            </div>
        </div>
        <!------------------------------------>
        <div class="box">
            <img src="images/Cold Brew.jpg" alt="">
            <h3>Cold Brew</h3>
            <div class="price">$11.99</div>
            <div class="desc">
                <p>
                    Cold brew coffee is a smooth and refreshing beverage made by steeping coarsely ground coffee beans in cold water for an extended period, usually 12 to 24 hours.
                    Cold brew coffee is known for its smooth, low-acidity flavor profile and naturally sweet undertones. 
                    It can be served over ice for a refreshing summer drink or mixed with milk or cream for a creamier texture.
                </p>
            </div>
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
</body>
</html>