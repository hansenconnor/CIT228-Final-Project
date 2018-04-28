<!-- start session -->
<?php session_start(); ?>

<?php 


//
// next version add check if note already exists -> and prompt user to overwrite if so
//

//
// connect to database using session variables ( user/pass )
//$mysqli = mysqli_connect("localhost", "root", "root", "final_project_db") or die(mysql_error());
include ('db_connect.php');


    //echo ("All form fields filled");
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO -> check if username already exists
    $sql = "SELECT username FROM `auth_users` WHERE username = '$username'";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) >= 1) {
        echo "<script>$('#loader-modal-title').text('username taken!');</script>";
        
        // echo '<script>alert("Username is taken!");</script>';
    }
        // if (mysqli_query($mysqli, $sql)) {
        //     mysqli_close($mysqli);
            
        //     // echo '<script>$("#loader-modal-title").text("Account Created!");
        //     // $("#spinner").replaceWith("<img src="assets/icons/checked.png" width="50px" alt="Checked Icon" />");</script>';
        //     //echo '<script>location.href = "../dashboard.php";</script>';
        //     // echo "New record created successfully";
        // } 
        else {
            $sql = "INSERT INTO `auth_users` (username, password) VALUES ('$username', '$password')";
            if (mysqli_query($mysqli, $sql)) {
                echo "<script>$('#loader-modal-title').text('Account Created!');</script>";
                // echo "<script>$('.modal-container').css('display','none');</script>";
                // echo '<script>alert("Account Created");</script>';
            }
        }
//
// close connection
mysqli_close($mysqli);
?>