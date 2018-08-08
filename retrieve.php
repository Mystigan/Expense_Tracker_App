<?php
date_default_timezone_set('Asia/Calcutta');
$current_date = date("Y-m-d");


	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<title>Expense Tracker App</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>
	<body>
		<h1 class="text-center">View Past Expenses</h1>
		<div class="container-fluid">
			<div class ="col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3">
				<div class="well">
					<h4 class="text-center">Retrieve Past Expenses</h4>
					<form action="#" method="post" autocomplete="off">
						<div class="form-group">
							<label for="get_date">Date:</label>
							<input id="mydate1"  type="date" class="form-control" name="get_date" value="<?php echo $current_date ?>" max="<?php echo $current_date; ?>" required>
						</div>
						<div class="form-group">
							<input class="btn btn-primary btn-block" type="submit" name="submit1" value="Submit" >
						</div>
						<?php
						if(isset($_POST['submit1'])){
	$date = $_POST['get_date'];
	require 'config.php';
	$conn = mysqli_connect($host, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT expense_category, expense_type, expense_amount FROM expense_table where expense_date='$date'";
	$result = mysqli_query($conn, $sql);
						echo '<table class="table table-bordered table-condensed">
						<thead>
						<tr>
						<th>Category</th>
						<th>Type</th>
						<th>Amount</th>
						</tr>
						</thead>
						<tbody>';
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
								echo "<td>" . $row["expense_category"]. " </td><td> " . $row["expense_type"]. "</td><td> " . $row["expense_amount"]. "</td>";
								echo '</tr>';
							}
						} else {
							echo "0 results";
						}
						echo '</tbody>
						</table>';
					?>
					<div class="form-group">
						<a href="index.php"><input class="btn btn-primary btn-block" type="button" name="home" value="Home" ></a>
					</div>
				</form>
			</div>
		</div>		
	</div>	
</body>
</html>	
<?php
	mysqli_close($conn);
	}
?>	