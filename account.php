<?php
include 'connect.php';
session_start();
include 'header.php';
?>

<html>
<head><title> Change your account settings</title></head>
	<body> 
		<form action = "account.php" method = "POST"><br/><br/>
			Old Password: <input type = "text" name = "old_password"><br/><br/>
			New Password: <input type = "text" name = "new_password"><br/><br/>
			Confirm Password: <input type = "text" name = "conf_password"><br/><br/>

		<input type = "submit" name = "submit" value = "Apply changes">  
	<body>
</html>

<?php	
					
$old_password 		= @$_POST['old_password'];
$new_password 		= @$_POST['new_password'];
$conf_password 		= @$_POST['conf_password'];
$old_enc_password 	= sha1($old_password);
$encrypt_pass		= sha1($new_password);

if(isset($_POST['submit'])){
	$sql = "select * from users where (user_name = '".$_SESSION["username"]."');";	            
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);

		while($row = mysqli_fetch_assoc($result)){
			$db_pasword = $row['user_password'];
			$id = $row['user_id'];
		}
		
		if(($old_enc_password == $db_pasword )&&($conf_password ==$new_password)){
			$sql = "UPDATE users SET user_password = '$encrypt_pass' WHERE user_name = '".$_SESSION["username"]."';";
			if($result = mysqli_query($conn,$sql)){
				echo 'Your new password have been set. Return to ';
				echo "<a href = 'profile.php?id=$id'>"."My Account"."</a>";				
			}			
		}
		else{
			echo 'You have supplied a wrong user/password combination or a mismatch has taken place. Please try again.';
		}
		
}
mysqli_close($conn);
include 'footer.php';
?>