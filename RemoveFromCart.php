<?php
    session_start();

    // Function to add item to cart
    function RemoveFromCart($itemNo) {
        //Create session variable with item ID if doesn't exist
        if (isset($_SESSION["_$itemNo"])) {
            unset($_SESSION["_$itemNo"]); 
        }
    }

    // Check if itemNo and quantity are set in the POST request
    if (isset($_POST['itemNo'])) {
        // Get itemNo and quantity from POST request
        $itemNo = $_POST['itemNo'];

        // Call the RemoveFromCart function
        RemoveFromCart($itemNo);

        // Send a response back to the client
        echo "Item removed from cart successfully.";
    } else {
        // If itemNo or quantity is not set in the POST request, send an error response
        echo "Error: itemNo is not set.";
    }
?>
