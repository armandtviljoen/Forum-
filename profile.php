<?php
include 'connect.php';
session_start();
if (@$_SESSION["username"]){
?>

<html><head><title> Your Account!</title></head></html> 

<?php	
include("header.php");
	if (@$_GET["id"]){
		$sql = "select * from users where (user_id = '".$_GET["id"]."');";	            
		$result = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($result);
		
		if($rows != 0){
			while($row = mysqli_fetch_assoc($result)){
			$thisuser = $row['user_name'];
			echo "</center><h1>".$row['user_name']."</h1><img src='".$row['user_picture']."' width='150' height='150'><br/><center>";
			echo "Date Registered: ".$row['join_date']."<br/>";
			echo "Email Address: ".$row['user_email']."<br/>";		
			}
		} 
		else{
			echo 'ID not found';
		}
	} 
	else{
	header("Location: index.php");
	}
	
if($_SESSION["username"] == $thisuser){
	echo "<br/>You may change your password ";
	echo "<a href = 'account.php'>here</a>";
	echo "<br/>You may change your picture ";
	echo "<a href = 'profilepic.php'>here</a>";
}	

if (@$_GET["action"] == "logout"){
	session_destroy();
	header("Location: login.php");
}
}else {
	echo 'You must be logged in.';
}	
?>