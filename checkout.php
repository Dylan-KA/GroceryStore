<?php
    session_start();

    function PrintProduct($ID, $quantity) : void {
        $conn = mysqli_connect("localhost","root","","assignment1");
        //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
        if (!$conn)
            die("Could not connect to Server");
                
            $query_string = "SELECT product_name, image_address, unit_price, unit_quantity, product_id FROM products WHERE product_id='$ID' ";

            $result = mysqli_query($conn, $query_string);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                while ($a_row = mysqli_fetch_row($result)) {
                    print "<div class='product'>\n";
                    print "<br>";
                    $index = 0;
                    $itemNo = "";
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
                            addToCostTotal($ID, $quantity);
                        } else if ($index==3) {
                            print "<p class='productText'>$field</p>\n";
                        } else if ($index==4) {
                            $itemNo = $field;
                        }
                                
                        $index++; 
                    }
                    print "<p class='productText'><b>Quantity: $quantity</b></p>\n";
                    print "<p class='productText InStockText'>In Stock</p>\n";
                    print "<button onclick='removeFromCart(\"$itemNo\")'>Remove from Cart</button>";
                    print "</div>";
                }
            }
        mysqli_close($conn);
    }

    function addToCostTotal($ID, $quantity) {

    }

    function removeFromCostTotal($ID) {
        
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
        function removeFromCart($itemNo) {
            var xhr = new XMLHttpRequest();
            var url = "RemoveFromCart.php";

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            var data = "itemNo=" + encodeURIComponent($itemNo);
            xhr.send(data);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Response from the server
                    console.log("Response Text: " + xhr.responseText);
                }
            };
            location.reload();
        }
        function validateCart() {
            //Check if in stock, etc.
            window.location = "delivery.php"
        }
        function clearCart() {
            var xhr = new XMLHttpRequest();
            var url = "ClearCart.php";

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Response from the server
                    console.log("Response Text: " + xhr.responseText);
                    location.reload();
                }
            };

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
    
    <?php
        if(!empty($_SESSION)) {
            echo "<section id='deliveryDetails'>";
            echo "<button onclick='clearCart()'>Clear Cart</button>";
            echo "</section>";
        }
    ?>

    <section id="featured-products">
        <?php
            foreach ($_SESSION as $key => $value) {
                $stripped_key = substr($key, 1);
                PrintProduct($stripped_key, $value);
            }
        ?>
    </section>  
    
    <?php
        if(empty($_SESSION)) {
            echo "<section id='hero'>";
            echo "<p>Your cart is empty</p>";
            echo "</section>";
        } else {
            echo "<section id='deliveryDetails'>";
            echo "<button onclick='validateCart()'>Place an Order</button>";
            echo "</section>";
        }
    ?>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>
