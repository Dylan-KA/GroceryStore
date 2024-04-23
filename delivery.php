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
    <script>
        function runAllValidations() {
            validateFirstName()
            validateLastName()
            validateStreetNumber()
            validateStreetName()
            validateSuburb()
            validatePostCode()
            validatePhoneNumber()
            validateEmail()
        }
        
        function validatePostCode() {
            var formInput = document.getElementById("PostCode").value;
            const pattern = /^\d{4}$/;
            if (pattern.test(formInput)) {    
                return true            
            } else {
                alert("Postcode is invalid");
            }
        }
        function validatePhoneNumber() {
            var formInput = document.getElementById("PhoneNumber").value;
            const pattern = /^\d{10}$/;
            if (pattern.test(formInput)) {    
                return true            
            } else {
                alert("Mobile number is invalid");
            }
        }
        function validateFirstName() {
            var formInput = document.getElementById("FirstName").value;
            const pattern = /^\w+$/;
            if (pattern.test(formInput)) {    
                return true            
            } else {
                alert("First Name is invalid");
            }
        }
        function validateLastName() {
            var formInput = document.getElementById("LastName").value;
            const pattern = /^\w+$/;
            if (pattern.test(formInput)) {    
                return true            
            } else {
                alert("Last Name is invalid");
            }
        }
        function validateStreetNumber() {
            var formInput = document.getElementById("StreetNumber").value;
            const pattern = /^\d+$/;
            if (pattern.test(formInput)) {
                return true            
            } else {
                alert("Street Number is invalid");
            }
        }
        function validateStreetName() {
            var formInput = document.getElementById("StreetName").value;
            const pattern = /^\s*\w+$/;
            if (pattern.test(formInput)) {
                return true            
            } else {
                alert("Street Name is invalid");
            }
        }
        function validateSuburb() {
            var formInput = document.getElementById("Suburb").value;
            const pattern = /^\s*\w+$/;
            if (pattern.test(formInput)) {
                return true            
            } else {
                alert("Suburb is invalid");
            }
        }
        function validateEmail() {
            var formInput = document.getElementById("Email").value;
            const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (pattern.test(formInput)) {
                return true       
            } else {
                alert("Email is invalid");
            }
        }
    </script>
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
        <input type="text" placeholder="First Name" name="fName"id="FirstName" required>
        <input type="text" placeholder="Last Name" name="lName" id="LastName" required>
        <input type="text" placeholder="Street Number" name="streetNumber" id="StreetNumber" required>
        <input type="text" placeholder="Street" name="street" id="StreetName" required>
        <input type="text" placeholder="Suburb" name="suburb" id="Suburb" required>
        <input type="text" placeholder="Postcode" name="pCode" id="PostCode" required>
        <select name="State" value="STATE" selected="selected" id="State" required>
            <option value="" disabled selected>State</option>    
            <option value="NSW">NSW</option>
            <option value="VIC">VIC</option>
            <option value="QLD">QLD</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
            <option value="NT">NT</option>
        <input type="text" placeholder="Mobile Number" name="mNumber" id ="PhoneNumber" required>
        <input type="text" placeholder="Email Address" name="email" id="Email" required>
    </form>
    <button onclick="runAllValidations()">Submit Order</button>
    </section>

    <footer>
        <p id="footer-text">&copy; 2024 The Fresh Friendly Grocer - Dylan Archer. All rights reserved.</p>
    </footer>
</body>
</html>

