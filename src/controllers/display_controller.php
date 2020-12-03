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
        $table_name = filter_input(INPUT_POST, 'table');
        //$table_name = strtolower($table_name);
        $rows = array();

        echo "<br>".strtoupper($table_name)."<br>";
        switch ($table_name)
        {
            case "Customer":
                $rows = array(
                    0 => "Cust_Id",
                    1 => "CName",
                    2 => "Cust_Pts",
                    3 => "CEmail",
                    4 => "Age"
                );
                break;
            case 'Establishment_Admin':
                $rows = array(
                    0 => "Admin_Id",
                    1 => "EAName",
                    2 => "Phone",
                    3 => "EAEmail",
                    4 => "Est_Id"
                );
                break;  
            case 'Establishment':
                $rows = array(
                    0 => "Est_Id",
                    1 => "EName",
                    2 => "Address",
                    3 => "Waste_Pts",
                    4 => "Type"
                );
                break; 
            case 'Orders':
                $rows = array(
                    0 => "Order_Id",
                    1 => "Pts",
                    2 => "Trans_Date",
                    3 => "Cust_Id",
                    4 => "Item_Id",
                    5 => "Est_Id"
                );
                break;
            case 'Reusable_Item':
                $rows = array(
                    0 => "Item_Id",
                    1 => "Category",
                    2 => "Pt_Val",
                    3 => "IName",
                    4 => "Cust_Id"
                );
                break;
            case 'visits':
                $rows = array(
                    0 => "Est_Id",
                    1 => "Cust_Id"
                );
                break;
        }
        $stmt = $conn->query("SELECT * FROM $table_name");
        if ($stmt)
        {$data = $stmt->fetchAll();
        if($data)
        {
            echo '<table border="1">';
            echo '<tr>';
            // attribute names
            foreach ($rows as $rowName)
            {
                echo '<td>' . $rowName . '</td>';
            }
            // table data
            foreach ($data as $row) 
            {
                echo '<tr>';
                foreach ($rows as $elem)
                {
                    echo '<td>' . $row[$elem] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        else
        {
            echo "No Records Available";
                    die(); 
        }}
    }    
?>