<style type="text/css">
<?php include '../style/style.css'; ?>
</style>
<?php
	if (isset($_GET['newmanufacturer']) && !isset($_GET['code']))
	{
		echo "<p class='errordisplay'>"."<span class='strongdisplay'>".$_GET['newmanufacturer'] . "</span>"." already exists in database."."</p>";
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}
	
	elseif (isset($_GET['newmanufacturer']) && isset($_GET['code']))
	{		
		echo "<p class='successdisplay'>"."<span class='strongdisplay'>".$_GET['newmanufacturer'] . "</span>"." has been registered with SKU Code " . "<span class='strongdisplay'>".$_GET['code']."</span>"."</p>";	
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}

	elseif (isset($_GET['product']))
	{
		echo "<p class='successdisplay'>"."<span class='strongdisplay'>".$_GET['product']."</span>"." has been added to the database."."</p>";
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}
	
	elseif (isset($_GET['manufacturer']))
	{
		echo "<p class='errordisplay'>"."The manufacturer " . "<span class='strongdisplay'>".$_GET['manufacturer']."</span>" . " is not recognized.  Please check spelling or register new manufacturer."."</p>";
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}
	elseif (isset($_GET['UPCfound']))
	{
		echo "<p>"."This item is already in the database."."</p>";
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}
	elseif (isset($_GET['noUPCfound']))
	{
		echo "<p>"."This item is NOT in the database. Please add it ASAP!"."</p>";
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}
	elseif (isset($_GET['productexist']))
	{
		echo "<p>"."This UPC has been already used."."</p>";
		echo "<p class='backlink'>"."<a href='/'>". "back" ."</a>"."</p>";
	}
?>
