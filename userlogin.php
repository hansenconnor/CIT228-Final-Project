<?php
	session_start();

	// TODO complete logout script by checking if session user / pass exists and is accurate

$error = "username/password incorrect";

//check for required fields from the form
if (($_POST['username']=="") || ($_POST['password']=="")) {
    header("Location: index.php");
    exit;
}
//connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());

//use mysqli_real_escape_string to clean the input
$safe_username = mysqli_real_escape_string($mysqli, $_POST['username']);
$safe_password = mysqli_real_escape_string($mysqli, $_POST['password']);

//create and issue the query
$sql = "SELECT f_name, l_name FROM auth_users WHERE username = '".$safe_username."' AND password = '".$safe_password."'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {
	$_SESSION["username"] = $safe_username;
	echo "<script>location.href = 'dashboard.php';</script>";
	exit;
} else {
	$_SESSION["error"] = $error;
	header("location: index.php"); //send user back to the login page.
	// display invalid username or password message
}
// $_SESSION["username"] = $username;


//close connection to MySQL
mysqli_close($mysqli);
?>
