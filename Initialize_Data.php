<?php
	$establishment_admin = "CREATE TABLE 
		establishment_admin (Est_Id VARCHAR(7) NOT NULL, 
		Admin_Id VARCHAR(7) NOT NULL, 
		EAName VARCHAR(30) NOT NULL,
		Phone VARCHAR(12),
		EAEmail VARCHAR(30), 
		PRIMARY KEY(Est_Id),
		FOREIGN KEY (Est_Id) REFERENCES establishment(Est_Id) );";

	$establishment = "CREATE TABLE 
		establishment (Est_Id VARCHAR(7) NOT NULL, 
		EName VARCHAR(30) NOT NULL, 
		Address VARCHAR(30) NOT NULL,
		Type VARCHAR(30),
		Waste_Pts INT, 
		PRIMARY KEY(Est_Id)) ;";

	$customer = "CREATE TABLE 
		customer (Cust_Id VARCHAR(7) NOT NULL, 
		CName VARCHAR(30) NOT NULL, 
		CEmail VARCHAR(30) NOT NULL,
		Age INT,
		Cust_Pts INT, 
		PRIMARY KEY(Est_Id)) ;"

	$visits = "CREATE TABLE 
		visits (Est_Id VARCHAR(7) NOT NULL, 
		Cust_Id VARCHAR(7) NOT NULL, 
		FOREIGN KEY (Est_Id) REFERENCES establishment(Est_Id), 
		FOREIGN KEY (Cust_Id) REFERENCES customer(Cust_Id));";
?>