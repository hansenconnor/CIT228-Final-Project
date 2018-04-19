<?php
	session_start();

$error = "username/password incorrect";

//check for required fields from the form
if (($_POST['username']=="") || ($_POST['password']=="")) {
    header("Location: index.php");
    exit;
}
$display_block="";
//connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "root", "assignment_08_db") or die(mysql_error());

//use mysqli_real_escape_string to clean the input
$safe_username = mysqli_real_escape_string($mysqli, $_POST['username']);
$safe_password = mysqli_real_escape_string($mysqli, $_POST['password']);

//create and issue the query
$sql = "SELECT f_name, l_name FROM auth_users WHERE username = '".$safe_username."' AND password = '".$safe_password."'";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {
	$_SESSION["username"] = $username;
	// TODO - change this to redirect to final project menu
	header("Location:success.html");
	exit;
} else {
	$_SESSION["error"] = $error;
	header("location: index.php"); //send user back to the login page.
	// display invalid username or password message

    //redirect back to login form if not authorized
    // $display_block = "<p style='text-align:center;color:red;font-size:2em;'>Please contact IT, your username and password are not valid</p>";
    // $display_block .= "<p style='text-align:center;font-size:2em;'><a href='index.html'> Return to login</a></p>";
}

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
