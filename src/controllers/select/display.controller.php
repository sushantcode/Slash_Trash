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
    echo $table_name."<br>";

    /*
    if($query = "SELECT * FROM :table")
    {    
        echo $table_name."<br>";
        echo $query."<br>";
        if($query==null)
        {      
            echo "No Record Available";      
            die();    
        }    
        else
        {
            $stmt = $conn->prepare($query);  
            $stmt->execute([':table' => $table_name);
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
    */

    $stmt = $conn->query("SELECT * FROM $table_name");
    //$stmt->execute([':table_name' => $table_name]);
    $data = $stmt->fetchAll();
    if($data != NULL)
    {
        foreach ($data as $row) {
            //echo implode($row)."<br>";
            echo "<br>";
            foreach($row as $elem)
            {
                echo $elem."   ";
            }
    }
    }
    else
    {
        echo "No Records Available";
                die(); 
    }
}    
?>