<?php
session_start();
require_once '../config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (isset($_GET['UPCfinder']))
{
	$searchUPC = filter_var($_GET['searchUPC'], FILTER_SANITIZE_STRING);
	
	$queryThisUPC = "SELECT * FROM `PRODUCTS` WHERE `PROD_UPC` = '$searchUPC'";
	$queryThisUPCResult = mysqli_query($conn, $queryThisUPC);
	
	if (mysqli_num_rows($queryThisUPCResult) > 0)
	{
		$headerlocation = "result.php?UPCfound=";
		header("Location: $headerlocation");
	}
	
	else
	{
		$headerlocation = "result.php?noUPCfound=";
		header("Location: $headerlocation");

	}
	
	mysqli_close($conn);
}

?>