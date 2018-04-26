<!-- start session -->
<?php session_start(); ?>

<?php 

//
// connect to database using session variables ( user/pass )
//$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());
include ('db_connect.php');

// 
// check if note title and note text -> store to variables
if(count(array_filter($_POST))!=count($_POST)){
  // TODO add span error if one or more inputs are empty
    header("Location: ../dashboard.php");
  }
  else {
    //echo ("All form fields filled");
      $noteUsername = $_SESSION['username'];
      $noteTitle = $_POST['note_title'];
      $noteText = $_POST['note_text'];
      $noteID = $_POST['note_id'];
      //
      // define sql command: push note and text ( TODO add other properties i.e. priority, date added, etc. )

      $sql = "UPDATE user_notes SET title = '$noteTitle', note = '$noteText' WHERE id = '$noteID'";


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
// close connection
mysqli_close($mysqli);
?>