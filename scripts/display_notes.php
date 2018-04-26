<!-- start session -->
<?php
session_start();
?>


<?php 

//
// connect to database using session variables ( user/pass )
//$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());
include('db_connect.php');

//
// define sql query: get all notes with column 'username' matching session username
$sql = "SELECT id, username, title, note FROM user_notes WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) >= 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = $row["title"];
        $text = $row["note"];
        echo ('<div class="row">');
            echo ('<div class="col-md-8 offset-md-2 note-wrapper" id="'.$row["id"].'">');
                echo ('<div class="note-header">');
                    echo ('<div class="note-title" id="'.$row["id"].'">' . $title . '</div>');
                    echo('<img src="assets/icons/pencil-edit-button.png" class="edit-note" id="'.$row["id"].'"/>');
                    echo('<img src="assets/icons/close.png" class="delete-note" id="'.$row["id"].'"/>');
                echo ('</div>');
                echo ('<div class="note-text"><p>'. $text .'</p></div>');
            echo ('</div>');
        echo ('</div>');
    }
    // mysql_free_result($result);
} else {
    echo "<script>location.href = '../dashboard.php';</script>";
    echo "0 results";
}

//
// close connection
mysqli_close($mysqli);
?>