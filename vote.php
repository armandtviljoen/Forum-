<?php

session_start();
include("header.php");

$poll_id = $_GET["id"];
				
?>					
	<html><head><title> Vote on this Poll.</title></head>
		<form action = <?php echo "vote.php?id=".$poll_id;?> method = "POST">
	</html>
<?php

if($_GET["id"]){
	
	$sql = "select * from polls where (poll_id = '".$_GET["id"]."')";	            
	$result = mysqli_query($conn,$sql);
	
	if($rows = mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$poll_id = $row['poll_id'];
			$sql_2 = "select * from users where (user_name = '".$row['poll_creator']."')";
			$result_2 = mysqli_query($conn,$sql_2);
			while($row_2 = mysqli_fetch_assoc($result_2)){
				$user_id = $row_2['user_id'];
			}	
			echo "<center><h2>".$row['poll_name']."</h2></center>";
			
?>	

<html><body><ra style="text-align:right;color:grey;" ></body></html>

<?php
			echo "<h5>By <a href = 'profile.php?id=$user_id'>"
					.$row['poll_creator'].
			     "</a> on ".$row['poll_date']."</h5><br/>";
?>	

<html><body> </ra></body></html>

<?php
			echo $row['poll_contents']."<br/>";
			$poll_options = $row['poll_options'];
			$opt_arr = explode(",", $poll_options);
			for($count = 1; $count < count($opt_arr); $count++ ){
				
				$sql_temp = "select count(*) as voted from votes 
							where (vote_value = '$count')
							and (reference_poll = '$poll_id')";
				$result_temp = mysqli_query($conn,$sql_temp);
				
				while($row_temp = mysqli_fetch_assoc($result_temp)){
					$votes_for = $row_temp['voted'];
				}	
				
				echo  "<b><br/>".$count."."." ".$opt_arr[$count]."</b><br/>";
				echo  "Currently at (".$votes_for.") vote(s).<br/>";
			}
			echo "<br/><br/>";
		}	
	}
?>	
	<html>
		<body>
		<br/><center>
			Please enter the number of your option to vote:
			<br/><input type = "text" name="vote_value"><br/><br/> 
			<input type = "submit" name = "CastVote" value = "Cast your vote"> 
			<input type = "submit" name = "backhome" value = "Return to home"> 			
		<br/></center>
		<body>
	</html>
<?php	
	if(isset($_POST['CastVote'])){
		$vote_creator 	= $_SESSION["username"];
		$vote_value		= @$_POST['vote_value'];
		$reference_poll = $poll_id;
		
		if($vote_value){
				$sql = "Delete from votes 
						where vote_creator = '$vote_creator'
						and reference_poll = '$reference_poll';";
				if($result = mysqli_query($conn,$sql)){	
					echo "Previous votes were deleted. ";	
				}
			
			if(($vote_value>=1)&&($vote_value<$count)){
				$sql = "insert into votes (vote_value, vote_creator, reference_poll) 			
				VALUES ('$vote_value','$vote_creator','$reference_poll');";
				if($result = mysqli_query($conn,$sql)){	
					header("Location: vote.php?id=$poll_id");	
				}
			}
			else{
				echo '<br/>Must enter a valid option number';		
			}
		}
		else{
			if($vote_value==0){
				echo '<br/>Must enter a valid option number';					
			}
			else{
				echo '<br/>Fields may not be left empty, please try again';				
			}
					
		}
	}
	if(isset($_POST['backhome'])){
		header("Location: index.php");
	}	
	
}
include 'footer.php';
?>