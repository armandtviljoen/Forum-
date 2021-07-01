
<html>
<head><title> Login to your Account</title></head>
	<body> 
		<form action = "login.php" method = "POST">
			Username: <input type = "text" name = "username"><br/><br/>
			Password: <input type = "text" name = "password"><br/><br/>
		<input type = "submit" name = "submit" value = "Login">  
	<body>
</html>


<?php
include 'connect.php'; 	
session_start();																

echo " Click  <a href='register.php'>here</a> to register as a new member.";

$username 		= @$_POST['username']; 						
$password 		= @$_POST['password'];
$encrypt_pass 	= sha1($password);

	if(isset($_POST['submit'])){	
		if($username && $password){
			
			$sql = "select * from users where (user_name = '$username') and (user_password = '$encrypt_pass');";	            
			$result = mysqli_query($conn,$sql);
			$rows = mysqli_num_rows($result);
			
			if($rows != 0){
				while($row = mysqli_fetch_assoc($result)){
					$db_username = $row['user_name'];
					$db_pasword = $row['user_password'];
				}
				if(($username = $db_username )&&($encrypt_pass  = $db_pasword)){
					@$_SESSION["username"] = $username; 
					header("Location: index.php");
					
				}
			} 
            else
            {
                echo 'You have supplied a wrong user/password combination. Please try again.';
            }
		}

	}
	
mysqli_close($conn);
include 'footer.php';
?>
