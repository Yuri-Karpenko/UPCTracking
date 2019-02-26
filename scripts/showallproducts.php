<?php
include '../header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<Title>NGP Mothership</Title>
	<link rel="stylesheet" type="text/css" href="../style/style.css"> 
</head>
<body style="text-align: center; width: 70%; margin: auto;">
<?php
require '../config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sqlselect = "SELECT * FROM PRODUCTS";
$sqlresult = mysqli_query($conn, $sqlselect) or die("Bad Query: $sqlselect");
$num_rows = mysqli_num_rows($sqlresult);

echo"Total number of products in the database is $num_rows\n";
echo"<table>";
echo"<tr><td>Manufacturer</td><td>Item Name</td><td>Item Model Number</td><td>Storage</td><td>RAM</td><td>Color</td><td>UPC</td></tr>";

while($row = mysqli_fetch_assoc($sqlresult)) {
	echo"<tr><td>{$row['MAN_NAME']}</td><td>{$row['PROD_MOD_NAME']}</td><td>{$row['PROD_MOD_NUM']}</td><td>{$row['PROD_ROM']}</td><td>{$row['PROD_RAM']}</td><td>{$row['PROD_COLOR']}</td><td>{$row['PROD_UPC']}</td></tr>";
}

echo"</table>";
?>
</body>
</html>