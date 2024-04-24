<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fresh Friendly Grocer</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <p><a href="/GroceryStore/index.html">
        <img src="images/website-logo.svg" id="logo" > 
    </a></p>
        <h1>The Fresh Friendly Grocer</h1>
        <div class="header-bottom"></div>
    </header>

    <section id="hero">
        <h2>Your order has been placed!</h2>
        <p>We have sent you a confirmation email.</p> 
        <p>A summary of your order details are below:</p>
    </section>
    
    <section id="featured-products">
        <div>
            <h3>Order Details</h3>
            <p>Apples</p>
            <p><b>Total</b></p>
            <p>$100.00</p>
        </div>
    </section>

    <section id="featured-products">
        <div>
            <h3>Customer Details</h3>
            <p>First name</p>
            <p>Last name</p>
            <p>Street Name</p>
            <p>Postcode</p>
            <p>City/Suburb</p>
            <p>Email</p>
            <p>Mobile Number</p>
        </div>
    </section>
    <br>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>

