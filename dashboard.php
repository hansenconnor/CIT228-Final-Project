<!-- start session -->
<?php
  session_start();
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Dashboard</title>
  <meta name="author" content="Connor Hansen">
    
  <!-- custom styles -->
  <link rel="stylesheet" href="css/styles.css?v=1.0">
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

<?php

$mysqli = mysqli_connect("localhost", "root", "", "final_project_db") or die(mysql_error());
  //
  // query database to check if note exists using username from session var
  //create and issue the query
$sql = "SELECT username, note FROM user_notes WHERE username = 'hanse174'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

echo $_SESSION["username"];

// 
// check if a note exists
if (mysqli_num_rows($result) == 1) {
  // note exists so alert user
	echo("Note exists!");
	exit;
} else {
  // note doesn't exist
  echo("No Note!");
}
?>



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

      <!-- TODO add buttons to create, edit, and remove notes -->

      <!-- Each note will have the following properties: title, date created, content, and priority. 
           Priorities will be determined by a dropdown selector with the following options: 
           None (default), low, medium, and high. 
           Priorities will be represented by a specific color when viewed on the dashboard. 
      -->

  <section id="notes">
      <div class="container">
          <div class="row">
            <!-- TODO populate this field with notes once user is logged in -->
            <!-- TODO Add initial message 'You don't have any notes yet! -->
            <!-- Click here to create your first note... -->
              <div class="col-md-8 offset-md-2">
                  <button id="createNote">New Note</button>
              </div>
          </div>
      </div>
  </section>

  <!-- Hidden modal for note creation (possibly edit/deletion later on...) -->
  <section id="note-modal">
      <div class="container">
          <div class="row">
              <div class="col">
                <form class="contact-form" action="">
                  <input type="text" placeholder="Note Title">
                  <br>
                  <input type="text" placeholder="Begin typing your note...">
                  <button id="cancelNote">Cancel</button>
                  <!-- TODO reset input fields when cancel button is clicked -->
                </form>
              </div>
          </div>
      </div>
  </section>

  <!-- helpers -->
  <script src="js/helper.js"></script>
</body>
</html>