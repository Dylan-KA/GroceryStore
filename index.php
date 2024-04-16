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
        <img src="images/website-logo.svg" id="logo"> 
        <h1>The Fresh Friendly Grocer</h1>
        <div class="header-bottom">
            <div class="search-bar">
                <input type="text" placeholder="Search for products..." >
            </div>
        </div>
    </header>

    <div class="navbar">
        <div class="subnav">
            <button class="subnavbtn" >All Products<i class="fa fa-caret-down"></i></button>
        </div>
        <div class="subnav">
            <button class="subnavbtn" onclick="scrollToElement('frozen_food')" >Frozen Food<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="javascript:scrollToElement('frozen_food')">Frozen Meats</a>
            <a href="javascript:scrollToElement('frozen_food')">Frozen Deserts</a>
            </div>
        </div> 
        <div class="subnav">
            <button class="subnavbtn" onclick="scrollToElement('fresh_goods')" >Fresh Goods<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="javascript:scrollToElement('fresh_goods')">Dairy</a>
            <a href="javascript:scrollToElement('fresh_goods')">Meat</a>
            <a href="javascript:scrollToElement('fresh_goods')">Fruit</a>
            </div>
        </div> 
        <div class="subnav">
            <button class="subnavbtn" onclick="scrollToElement('drinks')" >Drinks<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="javascript:scrollToElement('drinks')">Tea</a>
            <a href="javascript:scrollToElement('drinks')">Coffee</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn" onclick="scrollToElement('pet_food')" >Pet Food<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="javascript:scrollToElement('pet_food')">Dog</a>
            <a href="javascript:scrollToElement('pet_food')">Cat</a>
            <a href="javascript:scrollToElement('pet_food')">Bird</a>
            <a href="javascript:scrollToElement('pet_food')">Fish</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn" onclick="scrollToElement('other')" >Other<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
            <a href="javascript:scrollToElement('other')">Medicine</a>
            <a href="javascript:scrollToElement('other')">Other</a>
            </div>
        </div>
    </div>
    
    <section id="hero">
        <form action="checkout.php">
            <input type="image" src="icons/shopping_cart.svg" class="cart-button"/>
        </form>
        <h2>Get Fresh Groceries Delivered to Your Doorstep</h2>
        <p>Order from a wide range of fresh fruits, vegetables, dairy products, meats, and more.</p>
    </section>

    <section id="featured-products">
        <h2>Frozen Food<a id="frozen_food"></h2>

        <div>
            <?php
                $conn = mysqli_connect("localhost","root","","assignment1");
                //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
                if (!$conn)
                    die("Could not connect to Server");
                
                $query_string = "SELECT product_name, image_address, unit_price, unit_quantity FROM products WHERE category='Frozen Food' ";

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
                        print "<button>Add to Cart</button>";
                        print "<br>";
                        print "</div>";
                    }
                }

                mysqli_close($conn);
            ?>
        </div>
    </section>
    
    <section id="featured-products">
        <h2>Fresh Goods<a id='fresh_goods'></h2>

        <div>
            <?php
                $conn = mysqli_connect("localhost","root","","assignment1");
                //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
                if (!$conn)
                    die("Could not connect to Server");
                
                $query_string = "SELECT product_name, image_address, unit_price, unit_quantity FROM products WHERE category='Fresh Goods' ";

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
                        print "<button>Add to Cart</button>";
                        print "<br>";
                        print "</div>";
                    }
                }

                mysqli_close($conn);
            ?>
        </div>
    </section>

    <section id="featured-products">
        <h2>Drinks<a id="drinks"></h2>

        <div>
            <?php
                $conn = mysqli_connect("localhost","root","","assignment1");
                //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
                if (!$conn)
                    die("Could not connect to Server");
                
                $query_string = "SELECT product_name, image_address, unit_price, unit_quantity FROM products WHERE category='Drinks' ";

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
                        print "<button>Add to Cart</button>";
                        print "<br>";
                        print "</div>";
                    }
                }

                mysqli_close($conn);
            ?>
        </div>
    </section>
    
    <section id="featured-products">
        <h2>Pet Food <a id="pet_food"></h2>

        <div>
            <?php
                $conn = mysqli_connect("localhost","root","","assignment1");
                //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
                if (!$conn)
                    die("Could not connect to Server");
                
                $query_string = "SELECT product_name, image_address, unit_price, unit_quantity FROM products WHERE category='Pet Food' ";

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
                        print "<button>Add to Cart</button>";
                        print "<br>";
                        print "</div>";
                    }
                }

                mysqli_close($conn);
            ?>
        </div>
    </section>

    <section id="featured-products">
        <h2>Other<a id="other"></h2>

        <div>
            <?php
                $conn = mysqli_connect("localhost","root","","assignment1");
                //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
                if (!$conn)
                    die("Could not connect to Server");
                
                $query_string = "SELECT product_name, image_address, unit_price, unit_quantity FROM products WHERE category='Other' ";

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
