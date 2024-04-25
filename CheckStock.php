<?php
    session_start();

    $returning = true;

    //for each session variable, check stock
    foreach ($_SESSION as $ID => $quantity)
    {
        $stripped_key = substr($ID, 1);
        $conn = mysqli_connect("localhost","root","","assignment1");
        //$link = mysqli_connect("aa4xf37s2fw51e.cs0uliqvpua0.us-east-1.rds.amazonaws.com","uts","internet","uts");
        if (!$conn)
            die("Could not connect to Server");
            
            $query_string = "SELECT product_id, in_stock FROM products WHERE product_id='$stripped_key' ";

            $result = mysqli_query($conn, $query_string);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                while ($a_row = mysqli_fetch_row($result)) {
                    $index = 0;
                    foreach ($a_row as $field)
                    {
                        if ($index==1 && $field < $quantity) 
                        {
                            $returning = false;
                        }    
                        $index++; 
                    }
                }
            }
        mysqli_close($conn);

    }
    
    if ($returning) {
        echo "true";
    } else {
        echo "false";
    }
    
?>

