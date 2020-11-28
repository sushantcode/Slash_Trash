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
    $Cust_Id = filter_input(INPUT_POST, 'Cust_Id');
    $CName = filter_input(INPUT_POST, 'CName');
    $Cust_Pts = filter_input(INPUT_POST, 'Cust_Pts');
    $CEmail = filter_input(INPUT_POST, 'CEmail');
    $Age = filter_input(INPUT_POST, 'Age');

    if($query = "INSERT INTO customer (Cust_Id, CName, Cust_Pts, CEmail, Age) VALUES (:Cust_Id, :CName, :Cust_Pts, :CEmail, :Age)")
    {    
        if($query==null)
        {      
            echo "Unable to insert due to violation.";      
            die();    
        }    
        else
        {
            $stmt = $conn->prepare($query);  
            $stmt->execute(array(':Cust_Id' => $Cust_Id, ':CName' => $CName, ':Cust_Pts' => $Cust_Pts, ':CEmail' => $CEmail, ':Age' => $Age));
            $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
            echo 'New record inserted successfully.';
        }
    }
}
?>