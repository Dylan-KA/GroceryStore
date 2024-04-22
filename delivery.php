<?php
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
        <h2>Delivery Details</h2>
        <p>Please enter your details to submit your order</p>
    </section>

    <section id="deliveryDetails">
    <form action="" method="GET">
        <input type="text" placeholder="First Name" name="fName">
        <input type="text" placeholder="Last Name" name="lName">
        <input type="text" placeholder="Street" name="street">
        <input type="text" placeholder="Suburb" name="suburb">
        <input type="text" placeholder="Postcode" name="pCode">
        <select name="State" value="STATE" selected="selected">
    </form>
    <form action="" method="GET">
        <option value="NSW">NSW</option>
        <option value="VIC">VIC</option>
        <option value="QLD">QLD</option>
        <option value="WA">WA</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="ACT">ACT</option>
        <option value="NT">NT</option>
    </form>
    <form action="" method="GET">
        <input type="text" placeholder="Mobile Number" name="mNumber">
        <input type="text" placeholder="Email Address" name="email">
    </form>
    <button>Submit Order</button>
    </section>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>

