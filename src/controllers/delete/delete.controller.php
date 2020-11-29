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
    $Table_Name = filter_input(INPUT_POST, 'table');
    $input_id = filter_input(INPUT_POST, 'input_id');
    $Table_Id = "";
    $Table_Name = strtolower($Table_Name);
    switch ($Table_Name) {
        case 'customer':
            $Table_Id = "Cust_Id";
            break;
        case 'establishment_admin':
            $Table_Id = "Admin_Id";
            break;
        case 'establishment':
            $Table_Id = "Est_Id";
            break;   
        case 'order':
            $Table_Id = "Order_Id";
            break;
        case 'reusable_item':
            $Table_Id = "Item_Id";
            break;
    }

    echo $Table_Name;
    echo $Table_Id;
    echo $input_id;

    // DELETE FROM `customer` WHERE `customer`.`Cust_Id` = 'abc1234'
    if($query = "DELETE FROM :Table_Name WHERE :Table_Id = :input_id")
    {    
        if($query==null)
        {      
            echo "Unable to delete due to violation.";      
            die();    
        }    
        else
        {
            $stmt = $conn->prepare($query);  
            $stmt->execute(array(':Table_Name' => $Table_Name, ':Table_Id' => $Table_Id, ':input_id' => $input_id));
            $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
            echo 'Record deleted successfully.';
        }
    }
}
?>