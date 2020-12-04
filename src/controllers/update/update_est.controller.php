<?php
    require_once '../../utils/connect_database.php';

    // Check connection
    if(!$conn) 
    {  
        die("Connection failed");
    }
    else 
    {
        // Change to Establishment values

        $Est_Id = filter_input(INPUT_POST, 'Est_Id');
        $Est_Address = filter_input(INPUT_POST, 'Address');
        $EAEmail = filter_input(INPUT_POST, 'EAEmail');

        if($query = "UPDATE ESTABLISHMENT SET Est_Address = :Est_Address, EAEmail = :EAEmail WHERE Est_Id = :Est_Id")
        {    
            if($query==null)
            {      
                echo "Unable to update due to violation.";      
                die();    
            }    
            else
            {
                $stmt = $conn->prepare($query);  
                $stmt->execute(array(':Est_Id' => $Est_Id, ':Est_Address' => $Est_Address, ':EAEmail' => $EAEmail));
                $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
                if($stmt)
                    echo 'Record updated successfully.';
                else
                {
                    echo "Unable to update due to violation. Please check your input and the table."; 
                }
            }
        }

    }
    echo '<p><a href="javascript:history.go(-1)" title="return">&laquo; Return to Slash-Trash Homepage</a></p>';    
?>