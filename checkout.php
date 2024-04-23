<?php
    session_start();
    print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fresh Friendly Grocer</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script>
        function scrollToElement(targetId) {
            var element = document.getElementById(targetId);
            if (element) {
                element.scrollIntoView({ behavior: "smooth" });
                console.log("scrollling to: " + targetId);
            }
        }
    </script>
</head>
<body>
    <header>
    <p><a href="/GroceryStore/index.php">
        <img src="images/website-logo.svg" id="logo" > 
    </a></p>
        <h1>The Fresh Friendly Grocer</h1>
        <div class="header-bottom">

            <form action="/GroceryStore/search.php">
                <input type="text" placeholder="Search..." name="search">
            </form>

        </div>
    </header>
    
    <div class="navbar">
        <div class="subnav">
            <button class="subnavbtn"><i class="fa fa-caret-down"></i></button>
        </div>
    </div>
    
    <form action="/GroceryStore/index.php">
            <input type="image" src="icons/shopping_cart.svg" class="cart-button"/>
    </form>

    <section id="hero">
        <h2>Shopping cart</h2>
    </section>
    
    <section id="featured-products">
        <div class="checkoutBox">
            <h2>Header 2</h2>
        </div>
        <?php
            print_r($_SESSION);
        ?>
    </section>  

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>
