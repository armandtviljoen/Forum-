<?php
session_start();
include 'connect.php';
if (@$_SESSION["username"]){
	include("header.php");
	$username 	= $_SESSION["username"];
	$topic_id 	= $_GET["id"];	
	$upload_id 	= $_GET["upload"];
	
?>

<html><head><title> Leave a Comment </title></head>	
<body> 
	<form action = <?php echo "comments.php?id=".$topic_id."&upload=".$upload_id;?> method = "POST" enctype = "multipart/form-data">
	<br/><input type = "submit" name = "uploadfile" value = "Include Files in Comment"> <br/>
	<br/><input type = "file" name = "file[]" id = "file" multiple><br/><br/>
	<center>
		Contents:<br/><textarea style="resize:none; height:400px; width:800px;" name="comment_contents"></textarea ><br/><br/>
				<br/><br/><input type = "submit" name = "submit" value = "Post to Forum"><br/>
	</center><br/>	
</body>
</html>

<?php
	
	if(isset($_POST['uploadfile'])){	
		$comment_contents	= @$_POST['comment_contents'];
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
				header("Location: comments.php?id=$topic_id&upload=$upload_id");
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
		
		$comment_contents	= @$_POST['comment_contents'];
		
		$sql = "insert into comments (comment_creator, comment_date, comment_contents, reference_topic, upload_id) 			
		VALUES ('$username',now(),'$comment_contents','$topic_id','$upload_id ');";
		if(isset($_POST['submit'])){	
			if(strlen($comment_contents)<= 10000){	
				if($result = mysqli_query($conn,$sql)){	
					header("Location: topic.php?id=$topic_id");	
				}
			}else{
				echo 'Comment may not exceed 10 000 characters';		
			}
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