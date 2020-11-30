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

    if($query = "SELECT * FROM :table_name")
    {    
        echo $table_name;
        if($query==null)
        {      
            echo "No Record Available";      
            die();    
        }    
        else
        {
            $stmt = $conn->prepare($query);  
            $stmt->execute(array(':table_name' => $table_name));
            $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
            if($rows == null)
            {
                echo "No Records Available";
                die();  
            }
            else
            {
                echo implode("|",$rows);
            }
        }
    }
}
?>