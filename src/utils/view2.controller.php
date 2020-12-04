<?php
    require_once '../../utils/connect_database.php';

    // Check connection
    if(!$conn) 
    {  
        die("Connection failed");
    }
    else 
    {
        $query = "UPDATE TRANSACTION_INFO AS T1
            SET T1.Cust_Pts = T2.Total_Pts
            FROM (SELECT SUM(Pts) AS Total_Pts, Cust_Id
                    FROM TRANSACTION_INFO
                    GROUP BY Cust_Id) AS T2
            WHERE T1.Cust_Id = T2.Cust_Id;";
        $result = $conn->query($query);
        if ($result)
        {
            echo "<Br /><b>";
            echo "Customer points have been updated successfully for all orders that have been made recently.";
            echo "</b>";
        }
        else
        {
            echo "Error:".$query."
            ".$conn->error;
        }
    }
?>