<?php

// connect to the database
include('db_connect.php');

// define query -> select all entries from user_notes table
$query = "SELECT id, username, title, note FROM user_notes";

// store result
$result = mysqli_query($mysqli, $query);

// define array to hold notes
$notes_array = array();

// store result in array
while ($row = mysqli_fetch_assoc($result)) {
    $row_array['id'] = $row['id'];
    $row_array['title'] = $row['title'];

    array_push($notes_array,$row_array);
}
    $myfile = fopen("../JSON/notes.json", "w") or die("Unable to open file!");
    $printString = json_encode($notes_array);
    fwrite($myfile, $printString);
    fclose($myfile);

    // redirect to dashboard
    // header("Location: ../dashboard.php");
?>