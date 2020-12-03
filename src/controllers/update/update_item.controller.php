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
        // Change to Reusable Item values
        /*
        $Cust_Id = filter_input(INPUT_POST, 'Cust_Id');
        $Cust_Pts = filter_input(INPUT_POST, 'Cust_Pts');

        if($query = "UPDATE customer SET Cust_Pts = :Cust_Pts WHERE Cust_Id = :Cust_Id")
        {    
            if($query==null)
            {      
                echo "Unable to update due to violation.";      
                die();    
            }    
            else
            {
                $stmt = $conn->prepare($query);  
                $stmt->execute(array(':Cust_Id' => $Cust_Id, ':Cust_Pts' => $Cust_Pts));
                $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
                echo 'Record updated successfully.';
            }
        }
        */
    }
?>