<!-- start session -->
<?php session_start(); ?>

<?php 
    include ('db_connect.php');

    //echo ("All form fields filled");
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO -> check if username already exists
    $sql = "SELECT username FROM `auth_users` WHERE username = '$username'";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    // user exists
    if (mysqli_num_rows($result) >= 1) {
        // update modal title
        echo "<script>$('#loader-modal-title').text('username taken!');</script>";
        // TODO replace spinner with 'X' icon
        echo '<script>$(\'#spinner\').replaceWith(\'<img src="assets/icons/cancel.png" width="50px" alt="Checked Icon" />\');</script>';
    }
    // user doesn't exist
    else {
        // create user
        $sql = "INSERT INTO `auth_users` (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($mysqli, $sql)) {
            // update modal title
            echo "<script>$('#loader-modal-title').text('Account Created!');</script>";
            // echo "<script>$('.modal-container').css('display','none');</script>";
        }
    }
//
// close connection
mysqli_close($mysqli);
?>