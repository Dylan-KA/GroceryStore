<?php
    session_start();

    // Function to add item to cart
    function AddToCart($itemNo, $quantity) {
        //Create session variable with item ID if doesn't exist
        if (!isset($_SESSION["_$itemNo"])) {
            $_SESSION["_$itemNo"] = $quantity;
        } else {
            //Increment session variable if ID does exist
            $newQuantity = $_SESSION["_$itemNo"] += $quantity;
            $_SESSION["_$itemNo"] = $newQuantity; 
        }
    }

    // Check if itemNo and quantity are set in the POST request
    if (isset($_POST['itemNo']) && isset($_POST['quantity'])) {
        // Get itemNo and quantity from POST request
        $itemNo = $_POST['itemNo'];
        $quantity = $_POST['quantity'];

        // Call the AddToCart function
        AddToCart($itemNo, $quantity);

        // Send a response back to the client
        echo "Item added to cart successfully.";
    } else {
        // If itemNo or quantity is not set in the POST request, send an error response
        echo "Error: itemNo or quantity is not set.";
    }
?>
