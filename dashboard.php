<!-- start session -->
<?php session_start(); ?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Dashboard</title>
  <meta name="author" content="Connor Hansen">
    
  <!-- custom styles -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!-- jQuery -->
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>


<!-- Check if the user has any notes in the database -->
<!-- if not -> display prompt to create first note -->

<body>

<header>
        <nav>
          <ul id="main-menu">
            <li><a href="#">Do</a></li>
            <li><a href="#">I</a></li>
            <li><a href="#">Even</a></li>
            <li><a href="#">Need</a></li>
            <li><a href="#">These?</a></li>
            <li><a href="#">?</a></li>
          </ul>
        </nav>
      </header>

<?php
$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());
  //
  // query database to check if note exists using username from session var
  //create and issue the query
$sql = "SELECT username, note FROM user_notes WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

// 
// check if a note exists
if (mysqli_num_rows($result) == 1) {
  // note exists
  echo "<script>location.href = 'notes.php';</script>";
	exit;
} else {
  // note doesn't exist
  include('empty-notes.php');
}

//
// close connection
mysqli_close($mysqli);
?>

      
<footer> <!-- helpers -->
  <script src="js/helper.js"></script></footer>
</body>
</html>