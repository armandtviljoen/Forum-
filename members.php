<?php

include 'connect.php';
session_start();

if (@$_SESSION["username"]){
	
	include("header.php");
	$sql = "select * from users;";	            
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);
	echo "<center><br/> <h1>Members</h1> <br/>";
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['user_id'];
			echo "<a href = 'profile.php?id=$id'>".$row['user_name']."</a><br/>";
		}
	echo "</center>";
	if (@$_GET["action"] == "logout"){
		session_destroy();
		header("Location: login.php");
	}
}
else {
	echo 'You must be logged in.';
}	
?>