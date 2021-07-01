<?php

include 'connect.php';
session_start();

if (@$_SESSION["username"]){
	
	include("header.php");
	if(@$_GET["id"] == "0"){
	?>	

	<html><head><title> Number of options.</title></head>
		<body> 
			<form action = "poll.php?id=0" method = "POST"><br/><br/>	
				Number of Options: <input type = "text" name = "nroptions"><br/><br/>
			<center>
				<input type = "submit" name = "CreatePoll" value = "Create Options"><br/><br/> 
			</center>			
		<body>
	</html>
	
<?php
	}
		if(isset($_POST['CreatePoll'])){
			$nroptions =  @$_POST['nroptions'];
			header("Location: poll.php?id=$nroptions");
		}
		if(@$_GET["id"] != "0"){
			$options = $_GET["id"];
			for($count = 1; $count <= $options; $count++ ){			
?>	

		<html><head><title> Create Poll.</title></head>
			<form action = <?php echo "poll.php?id=".$options;?> method = "POST">
			<body><br/> 
				<?php echo "Option ".$count." description";?>
				<input type = "text" name = <?php echo "Option".$count;?>>
				<br/>
			<body>
		</html>
		
<?php	}?>	
			
		<html>
			<body>
			<br/><br/><center>
				Poll Name:<br/><input type = "text" name="poll_name" style = "width: 800px"><br/><br/> 
				Poll description:<br/>
				<textarea style="resize:none; height:200px; width:800px;" name="poll_contents">
				</textarea ><br/><br/>
				<input type = "submit" name = "PostPoll" value = "Post Poll to forum">  
				</center>
			<body>
		</html>
		
<?php		
	}
	if(isset($_POST['PostPoll'])){
		$poll_creator = $_SESSION["username"];
		$poll_options = '';
		for($count = 1; $count <= $options; $count++ ){		
			$op1 =  @$_POST['Option'.$count];
			$poll_options = $poll_options.','.$op1;
		}
		$poll_name 		= @$_POST['poll_name'];
		$poll_contents 	= @$_POST['poll_contents'];
		
		$sql = "insert into 
				polls (poll_creator, poll_date, poll_name, poll_options, poll_contents) 			
				VALUES ('$poll_creator',now(),'$poll_name','$poll_options','$poll_contents');";
				
		if($poll_creator && $poll_name && $poll_options && $poll_contents){		
			if($result = mysqli_query($conn,$sql)){	
				echo 'Your post have been uploaded to the forum.';	
			}
		}
		else{
			echo 'Fields may not be left empty, please try again';		
		}
	}
}
	include 'footer.php';
?>	