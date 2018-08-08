<?php
	date_default_timezone_set('Asia/Calcutta');
	$current_date = date("Y-m-d");

	require 'config.php';
	$connection = new PDO($dsn, $username, $password, $options);
	$stmt = $connection->prepare("SELECT expense_category FROM expense_table"); 
    $stmt->execute();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Expense Tracker App</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<h1 class="text-center">Basic Expense Tracker App</h1>
	<div class="container-fluid">
		<div class ="col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3">
			<div class="well">
				<h4 class="text-center">Add Expense</h4>
				<form action="action.php" method="post" autocomplete="off">
					<div class="form-group">
						<label for="date">Date:</label>
						<input id="mydate"  type="date" class="form-control" name="date" value="<?php echo $current_date ?>" max="<?php echo $current_date; ?>" required>
					</div>
					<div class="form-group">
						<label for="category">Category:</label>
						<input name="category" list="suggest" class="form-control" type="text" required>
						<datalist id="suggest">
							 <?php 
								while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
									echo '<option>' . $result['expense_category'] . '</option>';
								} 
							?>
						</datalist>
					</div>
					<div class="form-group">
						<label for="type">Type:</label>
						<div class="radio">
							<label><input type="radio" name="type" value="cash" checked>Cash</label>
						</div>	
						<div class="radio">
							<label><input type="radio" name="type" value="credit">Credit</label>
						</div>
					</div>
					<div class="form-group">
						<label for="amount">Amount:</label>
						<input name="amount" class="form-control" type="number" required>
					</div>
					<div class="form-group">
						<input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit" >
					</div>
					<div class="form-group">
						<a href="retrieve.php"><input class="btn btn-primary btn-block" type="button" name="view" value="View Expenses" ></a>
					</div>
				</form>
			</div>
		</div>		
	</div>		
	

</body>
</html>
