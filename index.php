<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fresh Friendly Grocer</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="images/website-logo.svg" id="logo"> 
        <h1>The Fresh Friendly Grocer</h1>
        <div class="header-bottom">
            <div class="search-bar">
                <input type="text" placeholder="Search for products..." >
            </div>
        </div>
    </header>

    <section id="hero">
        <!-- <img src="icons/shopping_cart.svg" class="cart-icon"> -->
        <input type="image" src="icons/shopping_cart.svg" class="cart-button"/>
        <h2>Get Fresh Groceries Delivered to Your Doorstep</h2>
        <p>Order from a wide range of fresh fruits, vegetables, dairy products, meats, and more.</p>
    </section>

    <section id="featured-products">
        <h2>Products</h2>

        <div>
            <?php
                $conn = mysqli_connect("localhost","root","","assignment1");
                //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
                if (!$conn)
                    die("Could not connect to Server");
                
                $query_string = "select product_name, unit_price, unit_quantity from products";

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
                                print "<h3 class='productText'>$field</h3>\n";
                            } else if ($index==1)
                            {
                                print "<p class='productText'>$$field</p>\n";
                            } else
                            {
                                print "<p class='productText'>$field</p>\n";
                            }
                                
                            $index++; 
                        }
                        print "<button>Add to Cart</button>";
                        print "<br>";
                        print "</div>";
                    }
                }

                mysqli_close($conn);
            ?>
        </div>
    </section>
    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>
