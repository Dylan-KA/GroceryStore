<?php
    session_start();

    function PrintProduct($ID, $quantity) : void {
        $conn = mysqli_connect("localhost","root","","assignment1");
        //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
        if (!$conn)
            die("Could not connect to Server");
                
            $query_string = "SELECT product_name, image_address, unit_price, unit_quantity FROM products WHERE product_id='$ID' ";

            $result = mysqli_query($conn, $query_string);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                while ($a_row = mysqli_fetch_row($result)) {
                    print "<div class='product'>\n";
                    print "<br>";
                    $index = 0;
                    foreach ($a_row as $field)
                    {
                        if ($index==0) 
                        {
                            print "<h3 class='productTextBold'>$field</h3>\n";
                        } else if ($index==1)
                        {
                            print "<div class='product-container'>";
                            print "<img src='$field' class='product'>";
                            print "</div>";
                        } else if ($index==2)
                        {
                            print "<p class='productText'>$$field</p>\n";
                        } else if ($index==3) {
                            print "<p class='productText'>$field</p>\n";
                        }
                                
                        $index++; 
                    }
                    print "<p class='productText'>$quantity</p>\n";
                    print "<br>";
                    print "</div>";
                }
            }
        mysqli_close($conn);
    }

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
        function validateCart() {
            //Check if in stock, etc.
            window.location = "delivery.php"
        }
    </script>
</head>
<body>
    <header>
    <p><a href="/GroceryStore/index.php">
        <img src="images/website-logo.svg" id="logo" > 
    </a></p>
        <h1>The Fresh Friendly Grocer</h1>
        <div class="header-bottom"></div>
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
        <?php
            foreach ($_SESSION as $key => $value) {
                $stripped_key = substr($key, 1);
                PrintProduct($stripped_key, $value);
            }
        ?>
    </section>  
    
    <section id="deliveryDetails">
        <button onclick="validateCart()">Proceed to Checkout</button>
    </section>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>
