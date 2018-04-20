<!-- start session -->
<?php session_start(); ?>


<?php 

// next version add check if note already exists -> and prompt user to overwrite if so

//
// connect to database using session variables ( user/pass )
$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());

// 
// check if note title and note text -> store to variables
if(count(array_filter($_POST))!=count($_POST)){
    echo ("something is empty");
  }
  else {
    echo ("All form fields filled");
      $noteUsername = $_SESSION['username'];
      $noteTitle = $_POST['note_title'];
      $noteText = $_POST['note_text'];
      //
      // define sql command: push note and text ( TODO add other properties i.e. priority, date added, etc. )
      $sql = "INSERT INTO user_notes (username, note) VALUES ('$noteUsername', '$noteText')";

      if (mysqli_query($mysqli, $sql)) {
        // redirect to dashboard
        mysqli_close($mysqli);
        echo "<script>location.href = '../dashboard.php';</script>";
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
  }




//
// get result
// $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));



//
// close connection
mysqli_close($mysqli);

//
// define sql command: push note and text ( TODO add other properties i.e. priority, date added, etc. )
?>