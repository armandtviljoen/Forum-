<?php
session_start();

include("header.php");
?>
<html>
	<body>
		<head><title> Home Page!</title></head>	
		<center>			
<?php
echo '<br/><br/><h2>Ongoing Threads</h2>';
echo '<table border = "1px;">';			
?>			
	<a href = 'post.php?upload=0'><button>Post Topic</button></a> <br/><br/>
	<tr>
		<td width = "400px;" style="text-allign:center;">Name</td>
		<td width = "100px;" style="text-allign:center;">Creator</td>
		<td width = "100px;" style="text-allign:center;">Date</td>
	</tr>	
		</center>
	</body>
</html> 

<?php
	$sql = "select * from topics;";	            
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);
	if($rows!=0){
		while($row = mysqli_fetch_assoc($result)){
			$topic_id = $row['topic_id'];
			echo '<tr>';
			echo "<td><a href = 'topic.php?id=$topic_id'>".$row['topic_name'].'</a></td>';
			
			$sql_2 = "select * from users where (user_name = '".$row['topic_creator']."');";	 
			$result_2 = mysqli_query($conn,$sql_2);
			while($row_2 = mysqli_fetch_assoc($result_2)){
			 $creator_id = $row_2['user_id'];	
			}
			echo "<td><a href = 'profile.php?id=$creator_id'>".$row['topic_creator'].'</a></td>';
			echo '<td>'.$row['topic_date'].'</td>';
			echo '</tr>';
		}	
	}else{
		echo "<br/><br/> No topics yet";
	}
echo '</table>';
echo '<br/><br/><h2>Ongoing Polls</h2>';	
?>
<html>
	<body> 
		<center>
			<a href = 'poll.php?id=0'><button>Create Poll</button></a><br/><br/> 			
<?php
echo '<table border = "1px;">';			
?>			
	<tr>
		<td width = "400px;" style="text-allign:center;">Name</td>
		<td width = "100px;" style="text-allign:center;">Creator</td>
		<td width = "100px;" style="text-allign:center;">Date</td>
	</tr>	
		</center>
	</body>
</html> 
<?php
	$sql = "select * from polls;";	            
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);
	if($rows!=0){
		while($row = mysqli_fetch_assoc($result)){
			$poll_id = $row['poll_id'];
			echo '<tr>';
			echo "<td><a href = 'vote.php?id=$poll_id'>".$row['poll_name'].'</a></td>';
			
			$sql_2 = "select * from users where (user_name = '".$row['poll_creator']."');";	 
			$result_2 = mysqli_query($conn,$sql_2);
			while($row_2 = mysqli_fetch_assoc($result_2)){
			 $creator_id = $row_2['user_id'];	
			}
			echo "<td><a href = 'profile.php?id=$creator_id'>".$row['poll_creator'].'</a></td>';
			echo '<td>'.$row['poll_date'].'</td>';
			echo '</tr>';
		}	
	}else{
		echo "<br/><br/> No polls yet";
	}
echo '</table>';
if (@$_GET["action"] == "logout"){
	session_destroy();
	header("Location: login.php");
}
?>