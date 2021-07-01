<?php
include 'connect.php';
session_start();
include 'header.php';
?>

<html>
		<head><title> Change your picture!</title></head>	

	<body> 
		<form action = "profilepic.php" method = "POST" enctype = "multipart/form-data"><br/><br/>
			image: <input type = "file" name = "file"><br/><br/>
		<input type = "submit" name = "submit" value = "Submit">  
		</form>
	<body>
</html>

<?php

if(isset($_POST['submit'])){	
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg','jpeg','png');
	
	if(in_array($fileActualExt,$allowed)){
		if($fileError == 0){
			if($fileSize < 1000000){
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = 'images/'.$fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);
				
				$sql = "select * from users where (user_name = '".$_SESSION["username"]."');";	            
				$result = mysqli_query($conn,$sql);
				$rows = mysqli_num_rows($result);

				while($row = mysqli_fetch_assoc($result)){
					$id = $row['user_id'];
				}
				
				$sql = "UPDATE users SET user_picture = '$fileDestination' WHERE user_name = '".$_SESSION["username"]."';";
				if($result = mysqli_query($conn,$sql)){
					echo 'Your new picture have been set. Return to ';
					echo "<a href = 'profile.php?id=$id'>"."My Account"."</a>";				
				}					
			}
			else{
				echo "File is too large.";
			}
		}
	}
	else{
		echo "This file type is not allowed.";
	}
}
mysqli_close($conn);
include 'footer.php';
?>