<?php
include 'connect.php';
if (@$_SESSION["username"]){
	
?>

<html>
	<body> 	
		<center>
			<a href = 'index.php'>Home Page</a>  		|
<?php
	$sql = "select * from users where (user_name = '".$_SESSION["username"]."');";	            
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['user_id'];
	}	
	echo "<a href = 'profile.php?id=$id'>"."My Account"."</a> |";
?>					
				
			<a href = 'members.php'>Members</a>  		|  
			<a href = "index.php?action=logout">Logout</a><br/>
		</center>
	</body>
</html>

<?php
}
else {
	header("Location: login.php");
}	
?>	

