<?php

    session_start();

    function PrintProductSearch($searchQuery) : void {
        $conn = mysqli_connect("awseb-e-8ihdzvvsqk-stack-awsebrdsdatabase-ckzu1vcamcll.cliy8o44kafs.us-east-1.rds.amazonaws.com","dylan","dylan123","assignment1");
        if (!$conn)
            die("Could not connect to Server");
                
            $query_string = "SELECT product_name, image_address, unit_price, unit_quantity, product_id, in_stock FROM products  WHERE product_name LIKE '%$searchQuery%' ";

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
                        } else if ($index==3) {
                            print "<p class='productText'>$field</p>\n";
                        } else if ($index==4) { $itemNo=$field; }    
                        else if ($index==5 && $field != 0) {
                            print "<p class='productText InStockText'>In Stock</p>\n";
                            print "<button onclick='addToCart(\"$itemNo\", 1)'>Add to Cart</button>";
                        } else if ($index==5 && $field == 0) {
                            print "<p class='productText OutStockText'>Out of Stock</p>\n";
                            print "<button id='OutOfStockBtn' disabled>Add to Cart</button>";
                        }
                                
                        $index++; 
                    }
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
        function addToCart(itemNo, quantity) {
            var xhr = new XMLHttpRequest();
            var url = "AddToCart.php";

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            var data = "itemNo=" + encodeURIComponent(itemNo) + "&quantity=" + encodeURIComponent(quantity);
            xhr.send(data);

            // Define a callback function to handle the server response
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Response from the server
                    console.log("Response Text: " + xhr.responseText);
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
        <div class="header-bottom">

            <form action="/GroceryStore/search.php">
                <input type="text" class="search-bar" placeholder="Search..." name="search">
            </form>

        </div>
    </header>

    <div class="navbar">
        <div class="subnav">
            <button class="subnavbtn" onclick="window.location.href='/GroceryStore/index.php';" >All Products<i class="fa fa-caret-down"></i></button>
        </div>
        <div class="subnav">
            <button class="subnavbtn" onclick="window.location.href='/GroceryStore/index.php';" >Frozen Food<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="/GroceryStore/index.php">Frozen Meats</a>
            <a href="/GroceryStore/index.php">Frozen Deserts</a>
            </div>
        </div> 
        <div class="subnav">
            <button class="subnavbtn" onclick="window.location.href='/GroceryStore/index.php';" >Fresh Goods<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="/GroceryStore/index.php">Dairy</a>
            <a href="/GroceryStore/index.php">Meat</a>
            <a href="/GroceryStore/index.php">Fruit</a>
            </div>
        </div> 
        <div class="subnav">
            <button class="subnavbtn" onclick="window.location.href='/GroceryStore/index.php';" >Drinks<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="/GroceryStore/index.php">Tea</a>
            <a href="/GroceryStore/index.php">Coffee</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn" onclick="window.location.href='/GroceryStore/index.php';" >Pet Food<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="/GroceryStore/index.php">Dog</a>
            <a href="/GroceryStore/index.php">Cat</a>
            <a href="/GroceryStore/index.php">Bird</a>
            <a href="/GroceryStore/index.php">Fish</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn" onclick="window.location.href='/GroceryStore/index.php';" >Other<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="/GroceryStore/index.php">Medicine</a>
            <a href="/GroceryStore/index.php">Other</a>
            </div>
        </div>
    </div>

    <form action="checkout.php">
        <input type="image" src="icons/shopping_cart.svg" class="cart-button"/>
    </form>

    <section id="featured-products">
        <h2>Products that match your search</h2>

        <div>
            <?php
                if (isset($_GET['search'])) {
                    $search_term = $_GET['search'];
                    PrintProductSearch($search_term);
                }
            ?>
        </div>
    </section>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>
