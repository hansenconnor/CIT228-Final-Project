<?php 
$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db");//

//$query="SELECT * FROM products LIMIT 20"; 
$query="SELECT * FROM comments"; 
$result=$mysqli->query($query)
	or die ($mysqli->error);

//store the entire response
$response = array();

//the array that will hold the titles and links
$posts = array();

while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ 
$comment_id=$row['id'];
$user_id=$row['user_id']; 
$comment=$row['comment'];

//each item from the rows go in their respective vars and into the posts array
$posts[] = array( 'id'=> $comment_id, 'user_id'=>$user_id, 'comment'=> $comment ); 

} 

//the posts array goes into the response
$response['comment'] = $posts;

//creates the file
$fp = fopen('comments.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

$display_block="<p>The comment information has been written to json</p>";
$display_block.="<p><a href='viewjsondata.php'>View chocolate info</a></p>";
?> 
<!DOCTYPE html>
<html>
<head>
<title>Create Json File</title>    
</head>    
<body>
<?php echo $display_block ?>    
</body>
</html>