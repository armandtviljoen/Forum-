<?php
//connect.php
$conn = mysqli_connect("localhost", "root" , "30257506");

if(!$conn)
{
	echo "Could not connect to database";
}
if(!mysqli_select_db($conn,'forum'))
{
	echo "Database not selected";
}
?>