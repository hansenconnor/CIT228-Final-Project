<?php
	session_start();

$error = "username/password incorrect";
$has_notes = false;

//check for required fields from the form
if (($_POST['username']=="") || ($_POST['password']=="")) {
    header("Location: index.php");
    exit;
}
$display_block="";
//connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "", "final_project_db") or die(mysql_error());

//use mysqli_real_escape_string to clean the input
$safe_username = mysqli_real_escape_string($mysqli, $_POST['username']);
$safe_password = mysqli_real_escape_string($mysqli, $_POST['password']);

//create and issue the query
$sql = "SELECT f_name, l_name FROM auth_users WHERE username = '".$safe_username."' AND password = '".$safe_password."'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {
	$_SESSION["username"] = $safe_username;
	// 
	// check if a note exists
    $sql = "SELECT note, username FROM user_notes WHERE username = '".$safe_username."'";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
	if ( mysqli_num_rows($result) == 1 ) {
		$_SESSION["note_status"] = $has_notes;
	}
	header("Location: dashboard.php");
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
<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
</head>
<body>
<?php echo $display_block; ?>
</body>
</html>
