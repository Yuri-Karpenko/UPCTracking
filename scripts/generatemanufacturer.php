<?php
session_start();
require_once '../config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) 
{
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['manufacturergenerator']))
{
	$newManufacturer = filter_var($_POST['newManufacturer'], FILTER_SANITIZE_STRING);
	
	$queryThisManufacturer = "SELECT * FROM `MANUFACTURERS` WHERE `MAN_NAME` = '$newManufacturer'";
	$queryThisManufacturerResult = mysqli_query($conn, $queryThisManufacturer);
	
	if (mysqli_num_rows($queryThisManufacturerResult) > 0)
	{
		$headerlocation = "result.php?newmanufacturer=" . $newManufacturer;
		header( "Location: $headerlocation" );
	}
	
	else
	{
		$queryManufacturer = "SELECT * FROM `MANUFACTURERS`";
		$queryManufacturerResult = mysqli_query($conn, $queryManufacturer);
		
		
		$currentManufacturerCount = mysqli_num_rows($queryManufacturerResult);
		$thisManufacturerNumber = sprintf('%04d', $currentManufacturerCount + 1);

		$insertManufacturerCode = "INSERT INTO `MANUFACTURERS` (`MAN_NAME`, `MAN_CODE`) VALUES ('$newManufacturer', '$thisManufacturerNumber')";
		$insertManufacturerCodeResult = mysqli_query($conn, $insertManufacturerCode);	
		$headerlocation = "result.php?newmanufacturer=" . $newManufacturer . "&code=" . $thisManufacturerNumber;
		header( "Location: $headerlocation" );

	}
	
	mysqli_close($conn);
}
?>