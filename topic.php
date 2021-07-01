<?php

session_start();
include("header.php");
$id = $_GET["id"];

?>
<html>
	<body> 
	<form action = <?php echo "topic.php?id=".$id;?> 
		  method = "POST" enctype = "multipart/form-data"><br/><br/>
	</body>
</html> 

<?php
 
if($_GET["id"]){
	
	$sql = "select * from topics where (topic_id = '".$_GET["id"]."')";	            
	$result = mysqli_query($conn,$sql);
	
	if($rows = mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$topic_id = $row['topic_id'];
			$upl_ref = $row['upload_id'];
			$sql_2 = "select * from users where (user_name = '".$row['topic_creator']."')";
			$result_2 = mysqli_query($conn,$sql_2);
			while($row_2 = mysqli_fetch_assoc($result_2)){
				$user_id = $row_2['user_id'];
			}	
			echo "<center><h2>".$row['topic_name']."</h2></center>";
			
?>	

<html><body><ra style="text-align:right;color:grey;" ></body></html>

<?php
			echo "<h5>By <a href = 'profile.php?id=$user_id'>"
					.$row['topic_creator'].
			     "</a> on ".$row['topic_date']."</h5>";
?>
	
<html><body></ra></body></html>

<?php
			echo $row['topic_content']."<br/>";
			
			$sql_findfiles = "select * from uploads 
							  where (upload_id = '".$row['upload_id']."')";	            
			$sql_findfiles_result = mysqli_query($conn,$sql_findfiles);
			while($sql_findfiles_row = mysqli_fetch_assoc($sql_findfiles_result)){
				$filename = $sql_findfiles_row['upload_name'];
			}
			if($upl_ref!=0){
				echo "<br/>Files attatched to this post:<br/>";
				$uploads = $filename;
				$upl_arr = explode(",", $uploads);
				for($i = 1; $i < count($upl_arr); $i++ ){
				?>	
				<a download = "<?php echo $upl_arr[$i] ?>" 
				href = <?php echo "files/".$upl_arr[$i] ?>><?php echo $upl_arr[$i] ?></a><br/>
				<?php
				}
			}
			echo "<br/><br/>";
		}	
	}

	$sql = "select * from comments where (reference_topic = '".$_GET["id"]."')";	            
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($result);
	if($rows != 0){
		while($row = mysqli_fetch_assoc($result)){
			$cupl_ref 			= $row['upload_id'];
			$comment_id 		= $row['comment_id'];
			$comment_contents 	= $row['comment_contents'];
			
			$sql_2 = "select * from users where (user_name = '".$row['comment_creator']."')";
			$result_2 = mysqli_query($conn,$sql_2);
			while($row_2 = mysqli_fetch_assoc($result_2)){
				$user_id = $row_2['user_id'];
			}	
?>	

<html><body><ra style="text-align:right;color:grey;" ></body></html>

<?php
			echo "<h5>By <a href = 'profile.php?id=$user_id'>"
					.$row['comment_creator'].
			     "</a> on ".$row['comment_date']."</h5>";
?>	

<html><body></ra></body></html>

<?php		
			$sql_findfiles = "select * from uploads 
							  where (upload_id = '$cupl_ref')";	            
			$sql_findfiles_result = mysqli_query($conn,$sql_findfiles);
			while($sql_findfiles_row = mysqli_fetch_assoc($sql_findfiles_result)){
				$filename = $sql_findfiles_row['upload_name'];
			}		 
			echo $row['comment_contents']."<br/>";
			if($cupl_ref!=0){
				echo "<br/>Files attatched to this post:<br/>";
				$uploads = $filename;
				$upl_arr = explode(",", $uploads);
				for($i = 1; $i < count($upl_arr); $i++ ){
					?>	
					<a download = "<?php echo $upl_arr[$i] ?>" 
					href = <?php echo "files/".$upl_arr[$i] ?>><?php echo $upl_arr[$i] ?></a><br/>
					<?php
				}
				echo "<br/><br/>";
			}
		}	
	}
	else{
		echo "<br/><br/><center><h5>No comments have been posted yet</h5></center>";
	}
	
?>	
<html>
	<body> 
		<br/><br/><br/><br/><br/><br/><br/><br/><center>
		<h4> Leave a
		<?php
			echo "<a href=comments.php?id=".$topic_id."&upload=0".">";
		?>
		 comment</a> to this post.</h4>
		 <br/></center>		 
	</body>
</html>
<?php	

}
include 'footer.php';
?>