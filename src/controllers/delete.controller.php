<?php
    $host = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "SLASHTRASH";

    // Create connection
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);

    // Check connection
    if(!$conn) 
    {  
        die("Connection failed");
    }
    else 
    {
        $table = filter_input(INPUT_POST, 'table');
        $input_id = filter_input(INPUT_POST, 'input_id');
        $table_id = "";
        $table = strtolower($table);

        switch ($table) 
        {
            case 'customer':
                $table_id = "Cust_Id";
                break;
            case 'establishment_admin':
                $table_id = "Admin_Id";
                break;
            case 'establishment':
                $table_id = "Est_Id";
                break;   
            case 'orders':
                $table_id = "Order_Id";
                break;
            case 'reusable_item':
                $table_id = "Item_Id";
                break;
        }

        $query = "DELETE FROM $table
                  WHERE $table_id = '$input_id'";
            
        echo "<br>".$query."<br>";

        if($conn->query($query))
        {
            echo "Deleted successfully";
        }
        else
        {
            echo "Error:".$query."
            ".$conn->error;
        }
    }
?>