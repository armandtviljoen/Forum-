<?php

session_start();
include 'connect.php';

if (@$_SESSION["username"]){
	
	$username = $_SESSION["username"];
	include("header.php");
	$upload_id = $_GET["upload"];	
?>

<html>
	<body><head><title> Create a Thread.</title></head> 
		<form action = <?php echo "post.php?upload=".$upload_id;?> method = "POST" enctype = "multipart/form-data">
			<br/><input type = "submit" name = "uploadfile" value = "Include a File in post"> <br/>
			<br/><input type = "file" name = "file[]" id = "file" multiple><br/>
		<center>
			Topic Name:<br/><input type = "text" name="topic_name"style = "width: 800px"><br/><br/> 
			Contents:<br/><textarea style="resize:none; height:300px; width:800px;" name="topic_contents"></textarea ><br/>
					 <br/><input type = "submit" name = "submit" value = "Post to Forum"><br/>
		</center>	
		<br/>
	</body>
</html>

<?php

	if(isset($_POST['uploadfile'])){	

		$countfiles = count($_FILES['file']['name']);
		$upload_name = '';
		for($i=0;$i<$countfiles;$i++){
		
			$filename = $_FILES['file']['name'][$i];
			$fileSize = $_FILES['file']['size'][$i];
				
			move_uploaded_file($_FILES['file']['tmp_name'][$i],'files/'.$filename);
			$upload_name = $upload_name.','.$filename;
						
		}
		
		$sql = "insert into uploads (upload_name, upload_date, upload_creator) 			
			VALUES ('$upload_name',now(),'$username');";	
		if($result = mysqli_query($conn,$sql)){
			$sql2 = "Select * from uploads
					where upload_name = '$upload_name';";	
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_assoc($result2)){
				$upload_id	= $row2['upload_id'];
				header("Location: post.php?upload=$upload_id");
			}				
		}
	}
				
	$sql2 = "Select * from uploads
			where upload_id = '$upload_id';";	
	$result2 = mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_assoc($result2)){
		$fileName	= $row2['upload_name'];
		echo "<b>Included files<br/></b>";
		$uploads = $row2['upload_name'];
		$upl_arr = explode(",", $uploads);
		for($count = 1; $count < count($upl_arr); $count++ ){
			echo  "<br/>".$upl_arr[$count];
		}
	}	

	if(isset($_POST['submit'])){
		
		$topic_name 	= @$_POST['topic_name'];
		$topic_contents	= @$_POST['topic_contents'];
		$topic_creator  = $_SESSION["username"];
	
	$sql = "insert into topics (topic_creator, topic_name, topic_content, topic_date, upload_id) 			
		VALUES ('$topic_creator','$topic_name','$topic_contents',now(),'$upload_id');";	

		if($topic_name && $topic_contents){	
			if(strlen($topic_name)<= 100){	
				if($result = mysqli_query($conn,$sql)){	
				header("Location: index.php");
				}
			}		
			else{
				echo '<br /><br />One of the entries is too lengthy, please try again.';		
			}
		}
		else{
			echo '<br /><br />Fields may not be empty.';		
		}
	}
	
}
else {
	header("Location: login.php");
}	

if (@$_GET["action"] == "logout"){
	session_destroy();
	header("Location: login.php");
}
include 'footer.php';
?>	

