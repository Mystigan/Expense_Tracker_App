<?php
	require "config.php";
	if(isset($_POST['submit'])){
		try {
			$date = $_POST['date'];
			$category = $_POST['category'];
			$type = $_POST['type'];
			$amount = $_POST['amount'];
			$connection = new PDO($dsn, $username, $password, $options);
			
			// prepare sql and bind parameters
    		$stmt = $connection->prepare("INSERT INTO expense_table (expense_date, expense_category, expense_type, expense_amount) 
    		VALUES (:expense_date, :expense_category, :expense_type, :expense_amount)");
    		$stmt->bindParam(':expense_date', $date);
    		$stmt->bindParam(':expense_category', $category);
    		$stmt->bindParam(':expense_type', $type);
    		$stmt->bindParam(':expense_amount', $amount);	
    		$stmt->execute();
    		header('location: index.php');
    		   		
		} catch(PDOException $error) {
			echo $sql . "<br>" . $error->getMessage();
		}	
	}
?>	