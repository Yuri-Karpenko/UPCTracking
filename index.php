<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
	<Title>NGP Mothership</Title>
	<link rel="stylesheet" type="text/css" href="style/style.css"> 
</head>
<body>
<?php
if(isset($_SESSION['id']))
{
	include 'header.php';
?>	
	<div class="sku-tool-div" id="std-1">
		<h3>Add new product</h3>

		<div class="container">	
			<Form name ="generateproductform" Method ="POST" Action ="scripts/generateproduct.php">
				<label span class="required-field">*Manufacturer:</label>
				<input type="text" name="itemManufacturer" required><br>
				<br>
				<label span class="required-field">*Model Name:</label>
				<input type="text" name="itemModelName" required><br>
				<br>
				<label>*Model Number:</label>
				<input type="text" name="itemModelNumber"><br>
				<br>
				<label>Storage:</label>
				<input type="text" name="itemROM"><br>
				<br>
				<label>RAM:</label>
				<input type="text" name="itemRAM"><br>
				<br>
				<label>Color:</label>
				<input type="text" name="itemColor"><br>
				<br>				
				<label>UPC:</label>
				<input type="text" name="itemUPC"><br><br>

				<input type="submit" name = "productgenerator" value="Add new product" class="productbtn">
			</form>
		</div>
	</div>
		
	<div class="sku-tool-div" id="std-2">
		<h3>Add new manufacturer</h3>

		<div class="container">
			<Form name ="generatemanufacturerform" Method ="POST" Action ="scripts/generatemanufacturer.php">
				<label span class="required-field">*Manufacturer:</label>
				<input type="text" name="newManufacturer" required><br><br>

				<input type="submit" name = "manufacturergenerator" value="Add new manufacturer" class="manufacturerbtn">
			</form>
		</div>
	</div>

	<div class="sku-tool-div" id="std-3">
		<h3>Search for UPC</h3>

		<div class="container">
			<Form name ="searchforupcform" Method ="GET" Action ="scripts/searchUPC.php">
				<label span class="required-field">*UPC:</label>
				<input type="text" name="searchUPC" required><br><br>

				<input type="submit" name = "UPCfinder" value="Search for UPC" class="searchbtn">
			</form>
		</div>
		<a href="scripts/showallproducts.php">Show all products</a>
	</div>
<?php
}
else
{
?>	
	<div id="frm">
		<form action="scripts/login.php" method="POST">
			<h3>NGP Mothership</h3>
			
			<p>
				<label>Username:</label>
				<input type="text" id="user" name="user" />
				
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="pass" name="pass" />
			</p>
			<p>
				<input type="submit" id="btn" value="Login" />
			</p>
		
	</div>
<?php
}
?>
</body>
</html>