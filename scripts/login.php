<?php session_start();
ob_start();
?><style type="text/css"><?php include '../style/style.css'; ?></style>
<?php
require_once '../config.php';

$username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) 
{
	die("Connection failed: " . mysqli_connect_error());
}

$queryUsers = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
$queryUsersResult = mysqli_query($conn, $queryUsers);

if (!$queryUsersResult) 
{
	die("Select failed");
}

$row = mysqli_fetch_array($queryUsersResult);
if ($row['username'] == $username && $row['password'] == $password)
{
	$_SESSION['id'] = $row['id'];
	$_SESSION['user'] = $row['username'];
	header('Location: ../index.php');
}
else
{
	echo "Failed to Login!";
	echo "<p class='backlink'>"."<a href='/'>". "Try Again" ."</a>"."</p>";
}
?>