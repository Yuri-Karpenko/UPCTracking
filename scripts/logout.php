<?php session_start();?>
<?php
session_destroy();

echo "You have successfully logged out";
echo "<p class='backlink'>"."<a href='/'>". "Log in" ."</a>"."</p>";
?>