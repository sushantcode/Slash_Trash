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

        $Admin_Id = filter_input(INPUT_POST, 'Admin_Id');
        $Phone = filter_input(INPUT_POST, 'Phone');
        $Waste_Pts = filter_input(INPUT_POST, 'Waste_Pts');

        if($query = "UPDATE ESTABLISHMENT_ADMIN SET Phone = :Phone, Waste_Pts = :Waste_Pts WHERE Admin_Id = :Admin_Id")
        {    
            if($query==null)
            {      
                echo "Unable to update due to violation.";      
                die();    
            }    
            else
            {
                $stmt = $conn->prepare($query);  
                $stmt->execute(array(':Admin_Id' => $Admin_Id, ':Phone' => $Phone, ':Waste_Pts' => $Waste_Pts));
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