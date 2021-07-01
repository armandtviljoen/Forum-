<html>
<head><title> Welcome to Registration!</title></head>
	<body> 
		<form action = "register.php" method = "POST"><br/><br/>
			Username: <input type = "text" name = "username"><br/><br/>
			Password: <input type = "text" name = "password"><br/><br/>
			Confirm Password: <input type = "text" name = "repassword"><br/><br/>
			Email:  <input type = "text" name = "email"><br/><br/>
		<input type = "submit" name = "submit" value = "Register Account">  
	<body>
</html>

<?php
include 'connect.php';																	
echo " Click  <a href='login.php'>here</a> to login";

$username 		= @$_POST['username']; 						
$password 		= @$_POST['password'];
$repassword 	= @$_POST['repassword'];
$encrypt_pass 	= sha1($password);
$email 			= @$_POST['email'];


	if(isset($_POST['submit'])){	

		if($username&&$password&&$repassword&&$email){
			if($password==$repassword){
				if((strlen($username)<25)||(strlen($password)<25)||(strlen($email)<50)){
					
					$sqlfindexistuser = "select * from users where user_name = '$username';";	            
					$findexistuser_result = mysqli_query($conn,$sqlfindexistuser);
					$rows = mysqli_num_rows($findexistuser_result);
					
					if($rows == 0){
						$sqlregisteruser = "insert into users (user_name, user_password, join_date, user_email) 			
								VALUES ('$username','$encrypt_pass', now(),'$email');";							
							 
						$registeruser_result = mysqli_query($conn,$sqlregisteruser);
						if(!$registeruser_result)
						{
						  echo 'Oops! Something went wrong while registering. Please try again later.';
						}
						else
						{
						  echo '<br/> Successfully registered as:'.$username."<br/>Click  <a href='login.php'>here</a> to login";
						}
					}
					else{
						echo "<br/><br/> Username already exists.";
					}					
				}
				else{
					echo "<br/><br/> Username/Password is too long.";
				}
			}
			else{
				echo "<br/><br/> Passwords do not match.";
			}
		}
		else{
			echo "<br/><br/> Fields may not be empty.";
		}
    }
	
mysqli_close($conn);
include 'footer.php';
?>


