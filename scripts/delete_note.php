<?php

session_start();

// get the note id to delete
$id = $_POST['delete_id'];

// connect to db
//$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());
include ('db_connect.php');

// define query to remove note where id matches POST id
$sql = "DELETE FROM user_notes WHERE id = $id";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

// close connection
mysqli_close($mysqli);

?>