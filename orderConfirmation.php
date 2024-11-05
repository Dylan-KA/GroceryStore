<?php
    
    session_start();

    $totalCost = 0.00;

    function removeStockFromDB() {
    $conn = mysqli_connect("localhost","root","","assignment1");
    if (!$conn)
        die("Could not connect to Server");

        foreach ($_SESSION as $key => $quantity) {
            // Update the in_stock column for the specified product ID and quantity
            $stripped_key = substr($key, 1);
            $query = "UPDATE products SET in_stock = in_stock - $quantity WHERE product_id = '$stripped_key'";
            mysqli_query($conn, $query);
        }

    mysqli_close($conn);
    }
    
    removeStockFromDB();

    function PrintProduct($ID, $quantity) : void {
        $conn = mysqli_connect("localhost","root","","assignment1");
        if (!$conn)
            die("Could not connect to Server");
            $query_string = "SELECT product_name, unit_price FROM products WHERE product_id='$ID' ";

            $result = mysqli_query($conn, $query_string);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                while ($a_row = mysqli_fetch_row($result)) {
                    $index = 0;
                    foreach ($a_row as $field)
                    {
                        if ($index==0) {
                            print "<p>$field, ";
                        } else if ($index==1) {
                            addToCostTotal($field, $quantity);
                            print "$$field each. Quantity: ($quantity)</p>";
                        }
                        $index++;
                    }
                }
            }
        mysqli_close($conn);
    }

    function addToCostTotal($price, $quantity) {
        global $totalCost;
        $totalCost += ($price * $quantity);
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
                    location.href="/GroceryStore/index.php"
                }
            };

        }
    </script>
</head>
<body>
    <header>
        <img src="images/website-logo.svg" id="logo" onclick="clearCart()">
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
            <?php
                foreach ($_SESSION as $key => $value) {
                    $stripped_key = substr($key, 1);
                    PrintProduct($stripped_key, $value);
                }
            ?>
            <p><b>Total Cost:</b></p>
            <?php
                $formattedTotalCost = number_format($totalCost, 2);
                echo "<p>$$formattedTotalCost</p>";
            ?>
        </div>
    </section>

    <?php
        if(!empty($_SESSION)) {
            echo "<section id='leftAlign'>";
            echo "<button class='backButton' onclick='clearCart()'>Return to Home page</button>";
            echo "</section>";
        }
    ?>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>

