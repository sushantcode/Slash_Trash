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

    if($table == 'customer')
    {
        $table_id = "Cust_Id";
    }
    else if($table == 'establishment_admin')
    {
        $table_id = "Admin_Id";
    }
    else if($table == 'establishment')
    {
        $table_id = "Est_Id";
    }
    else if($table == 'order')
    {
        $table_id = "Order_Id";
    }
    else if($table == 'reusable_item')
    {
        $table_id = "Item_Id";
    }
    
    /*
    switch ($table) {
        case 'customer':
            $table_id = "Cust_Id";
            break;
        case 'establishment_admin':
            $table_id = "Admin_Id";
            break;
        case 'establishment':
            $table_id = "Est_Id";
            break;   
        case 'order':
            $table_id = "Order_Id";
            break;
        case 'reusable_item':
            $table_id = "Item_Id";
            break;
        default:
            echo "Invalid table type.";
            die();
    }
    */

    echo $table;
    echo $table_id;
    echo $input_id;

    // DELETE FROM `customer` WHERE `customer`.`Cust_Id` = 'abc1234'
    if($query = "DELETE FROM :table WHERE :table_id = :input_id")
    {    
        if($query==null)
        {      
            echo "Unable to delete due to violation.";      
            die();    
        }    
        else
        {
            $stmt = $conn->prepare($query);  
            $stmt->execute(array(':table' => $table, ':table_id' => $table_id, ':input_id' => $input_id));
            $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
            echo 'Record deleted successfully.';
        }
    }
}
?>