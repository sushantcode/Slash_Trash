<?php
    $host = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "SLASHTRASH";

    // ** Madison's idea: Connect Customer, Establishment, Item, and Order
    // Customer uses one of their reusable items (worth some point value), 
    // places an order (order gains points which equal reusable item's point
    // value), the establishment gains waste points (need some value that checks
    // which item(s) was used and adds a certain amount of points depending on how
    // much waste was prevented and these points equal how much money was saved 
    // (the money is converted into points), and the customer gains points which are 
    // equal to establishment's waste points OR the orders points (need to choose). **

    // !!! Check with other teammates and get all view ideas then choose !!!

    // Create connection
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);

    // Check connection
    if(!$conn) 
    {  
        die("Connection failed");
    }
    else 
    {
        $input = filter_input(INPUT_POST, 'input_id');
        
        $query = "";
            
        //echo "<br>".$query."<br>";

        if($conn->query($query))
        {
            echo "View successfully done.";
        }
        else
        {
            echo "Error:".$query."
            ".$conn->error;
        }
    }
?>