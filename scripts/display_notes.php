<!-- start session -->
<?php
session_start();
?>


<?php 

//
// connect to database using session variables ( user/pass )
$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());
//
// define sql query: get all notes with column 'username' matching session username
$sql = "SELECT id, username, note FROM user_notes WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) >= 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Note ID: " . $row["id"] . " Username: " . $row["username"] . " Note: " . $row["note"];
        ?><br><?php
    }
    mysql_free_result($result);
} else {
    echo "<script>location.href = '../dashboard.php';</script>";
    echo "0 results";
}

//
// close connection
mysqli_close($mysqli);
?>