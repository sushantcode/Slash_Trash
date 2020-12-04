<?php
    require_once '../../utils/connect_database.php';

    // Check connection
    if(!$conn) 
    {  
        die("Connection failed");
    }
    else 
    {
        $cust_id = filter_input(INPUT_POST, 'Cust_Id');
        $start = filter_input(INPUT_POST, 'from_date');
        $end = filter_input(INPUT_POST, 'to_date');
        
        $query = "SELECT DISTINCT Cust_Id, CName, SUM(Pts)
                FROM TRANSACTION_INFO
                WHERE Cust_Id = ".$cust_id." AND Trans_Date >= ".$start." AND Trans_Date <= ".$end."
                GROUP BY Cust_Id;";
            
        //echo "<br>".$query."<br>";
        
        if($result = $conn->query($query))
        {
            echo "Customer ".$result["CName"]."(".$result["Cust_Id"].") have saved ".$result["SUM(Pts)"].
            "between ".$start." and ".$end;
        }
        else
        {
            echo "Error:".$query."
            ".$conn->error;
        }
    }
?>