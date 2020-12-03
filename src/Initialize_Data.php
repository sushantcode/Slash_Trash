<?php
	$host = "localhost:3306";
	$dbusername = "root";
	$dbpassword = "";

	try {
		$conn = new PDO('mysql:host='.$host, $dbusername, $dbpassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE SLASHTRASH";
		// use exec() because no results are returned
		$conn->exec("DROP DATABASE IF EXISTS SLASHTRASH");	
		$conn->exec($sql);
		echo "Database created successfully<br>";

	} 
	catch(PDOException $e) 
	{
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;

	//create tables:

	$establishment_admin = "CREATE TABLE 
		establishment_admin (
		Admin_Id VARCHAR(7) NOT NULL, 
		EAName VARCHAR(50) NOT NULL,
		Phone VARCHAR(20),
		EAEmail VARCHAR(50), 
		Est_Id VARCHAR(7) NOT NULL, 
		PRIMARY KEY(Admin_Id, Est_Id),
		FOREIGN KEY (Est_Id) REFERENCES establishment(Est_Id) );";

	$establishment = "CREATE TABLE 
		establishment (
		Est_Id VARCHAR(7) NOT NULL, 
		EName VARCHAR(50) NOT NULL, 
		Address VARCHAR(80) NOT NULL,
		Waste_Pts INT, 
		Type VARCHAR(30),
		PRIMARY KEY(Est_Id)) ;";

	$customer = "CREATE TABLE 
		customer (Cust_Id VARCHAR(7) NOT NULL, 
		CName VARCHAR(50) NOT NULL, 
		Cust_Pts INT, 
		CEmail VARCHAR(50) NOT NULL,
		Age INT,
		PRIMARY KEY(Cust_Id));";

	$visits = "CREATE TABLE 
		visits (Est_Id VARCHAR(7) NOT NULL, 
		Cust_Id VARCHAR(7) NOT NULL, 
		PRIMARY KEY (Est_Id, Cust_Id), 
		FOREIGN KEY (Est_Id) REFERENCES establishment(Est_Id), 
		FOREIGN KEY (Cust_Id) REFERENCES customer(Cust_Id));";

	$item = "CREATE TABLE 
		reusable_item (
		Item_Id VARCHAR(9) NOT NULL, 
		Category VARCHAR(20),
		Pt_Val INT, 
		IName VARCHAR(50) NOT NULL,
		Cust_Id VARCHAR(7) NOT NULL, 
		PRIMARY KEY(Item_Id, Cust_Id),
		FOREIGN KEY (Cust_Id) REFERENCES customer(Cust_Id) );";

	$order = "CREATE TABLE 
		orders (
		Order_Id VARCHAR(10) NOT NULL,
		Pts INT,
		Date DATE NOT NULL,
		Cust_Id VARCHAR(7) NOT NULL,
		Item_Id VARCHAR(9), 
		Est_Id VARCHAR(7) NOT NULL,
		PRIMARY KEY(Order_Id, Est_Id, Cust_Id),
		FOREIGN KEY (Est_Id) REFERENCES establishment(Est_Id),
		FOREIGN KEY (Item_Id) REFERENCES establishment(Item_Id),
		FOREIGN KEY (Cust_Id) REFERENCES customer(Cust_Id) );";

	$sql = $establishment.'
		'.$establishment_admin.'
		'.$customer.'
		'.$visits.'
		'.$item.'
		'.$order;
	//echo '<br>'.$sql.'<br>';
	
	$dbname = "SLASHTRASH";

	$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);
	// check connection
	if(!$conn)
	{
		die("Connection failed");
	}
	// connection worked
	else
	{
		if ($conn->query($sql) == TRUE) 
		{
  			echo "Table SLASHTRASH created successfully";
		} 
		else 
		{
  		echo "Error creating table: " . $conn->error;
		}
	}

	//Fill the tables
	$filenames = array
		(
			"Customer",
			"Establishment",
			"Establishment_Admin",
			"Reusable_Item",
			"visits",
			"Orders"
		);
	$num_filenames = count($filenames);
	$final_query = "";

	function validateDate($date, $format = 'Y-m-d')
	{
	    $d = DateTime::createFromFormat($format, $date);
	    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
	    return $d && $d->format($format) === $date;
	}

	for($i=0; $i < $num_filenames; $i++)
	{
		$firstline = TRUE;

		if (($fileread = fopen("../Data/".$filenames[$i].".csv", "r")) == TRUE)
		{
			while (($data = fgetcsv($fileread, 1000, ",")) == TRUE) 
			{
				if($firstline == TRUE)
				{
					$firstline = FALSE;
					continue;
				}

				$num = count($data);
				$values = "";
				for ($c=0; $c < $num; $c++) 
				{
					if(is_numeric($data[$c])    /*|validateDate($data[$c])*/   )
					{
						$values .= $data[$c];
					}
					else
					{
						$values .= "\"".$data[$c]."\"";
					}
					if($c<($num-1))
					{
						$values .= ", ";
					}
				}

				$insert_query = "INSERT INTO ".$filenames[$i]." VALUES (".$values.");";
				$final_query .= $insert_query;
				echo $insert_query."<br>";
			}
			fclose($fileread);
		}
	}

	if ($conn->query($final_query) == TRUE) {
  		echo "<br> Tables are filled";
	} else {
  		echo "Error: " . $final_query . "<br>" . $conn->error;
	}

	$conn = NULL;
?>