<?php
session_start();
require_once '../config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) 
{
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['productgenerator']))
{
	$itemModelName = filter_var($_POST['itemModelName'], FILTER_SANITIZE_STRING);
	$itemModelNumber = filter_var($_POST['itemModelNumber'], FILTER_SANITIZE_STRING);
	$itemROM = filter_var($_POST['itemROM'], FILTER_SANITIZE_STRING);
	$itemRAM = filter_var($_POST['itemRAM'], FILTER_SANITIZE_STRING);
	$itemColor = filter_var($_POST['itemColor'], FILTER_SANITIZE_STRING);
	$itemUPC = filter_var($_POST['itemUPC'], FILTER_SANITIZE_STRING);
	$itemManufacturer = filter_var($_POST['itemManufacturer'], FILTER_SANITIZE_STRING);
		
	$queryManufacturer = "SELECT * FROM `MANUFACTURERS` WHERE `MAN_NAME` = '$itemManufacturer'";
	$queryManufacturerResult = mysqli_query($conn, $queryManufacturer);

	$queryUPC = "SELECT * FROM `PRODUCTS` WHERE `PROD_UPC` = '$itemUPC'";
	$queryUPCResult = mysqli_query($conn, $queryUPC);

	
	if (!$queryManufacturerResult) 
	{
		die("Select failed");
	}

	if (mysqli_num_rows($queryUPCResult) > 0)
	{
		$headerlocation = "result.php?productexist=" ;
		header("Location: $headerlocation");
	}
	else
	{
	if (mysqli_num_rows($queryManufacturerResult) > 0) 
	{
		$row = mysqli_fetch_assoc($queryManufacturerResult);
		
		$newProduct = $itemManufacturer . " " . $itemModelName . " " . $itemModelNumber . " " . $itemROM ."GB/" . $itemRAM . "GB, " . $itemColor . " with " . $itemUPC;

		$insertProduct = "INSERT INTO `PRODUCTS` (`PROD_UPC`, `MAN_NAME`, `PROD_MOD_NAME`, `PROD_MOD_NUM`, `PROD_ROM`, `PROD_RAM`, `PROD_COLOR`) VALUES ('$itemUPC', '$itemManufacturer', '$itemModelName', '$itemModelNumber', '$itemROM', '$itemRAM', '$itemColor')";
		$insertProductResult = mysqli_query($conn, $insertProduct);	

		$headerlocation = "result.php?product=" . $newProduct;
		header( "Location: $headerlocation" );
	}
	
	else
	{
		$headerlocation = "result.php?manufacturer=" . $manufacturer;
		header( "Location: $headerlocation" );
	}
	}
	mysqli_close($conn);			
}
?>
