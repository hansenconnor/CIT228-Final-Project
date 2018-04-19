<?php

$comments = file_get_contents("comments.json");

$display="<div id='chocolate'><h1>Site top comments</h1>";

    $display="<div id='chocolate'><h1>All Comments</h1>";
	$commentObj = json_decode($comments);
	foreach ($commentObj->comment as $comment){
	  $id = $comment->id;
	  $user_id = $comment->user_id;
	  $theComment = $comment->comment;
      $display.= "<h2>" . $id . "</h2>" . "<p>Comment: " . $theComment . "</p>" . $user_id;
	 }
	 $display .= "</div>";
?>

<!DOCTYPE html>

<html>

<head>

<title>Comments</title>

</head>

<body>

<?php 

echo $display;

?> 

</body>

</html>	 

