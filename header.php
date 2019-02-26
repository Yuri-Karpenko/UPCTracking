<?php session_start();?>
<?php
if(!isset($_SESSION['id']))
{ 
    header('Location: scripts/login.php');
}
?><!DOCTYPE html>
<html>
<body>

<header>
<div id="header">
	<h1><a href="/">Mothership</a></h1>
	<form action="scripts/logout.php">
		<p><?php echo "Hello " . $_SESSION['user'];?></p>
		<button >Log Out</button>
	</form>
</div>
</header>

</body>
</html>