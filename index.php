<?php
  session_start();
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Login</title>
  <meta name="author" content="Connor Hansen">
    
  <!-- custom styles -->
  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
    <section class="form-section vertical-center">
        <div class="container">
            <div class="row menu-row">
                <div class="col-md-6 offset-md-3 login_container">
                  <h1 class="text-center">Login</h1>
                  <form action="userlogin.php" method="post">
                    <input name="username" placeholder="Username" type="text">
                    <input type="password" name="password" placeholder="Password" id="">
                    <button type="submit" id="login_button">Login</button>
                    <?php
                      if(isset($_SESSION["error"])){
                          $error = $_SESSION["error"];
                          echo ("<span style='color:red;'>$error</span>");
                      }
                    ?>  
                  </form>
                </div>
            </div>
        </div>
    </section>

  <!-- includes helpers if needed -->
  <!-- <script src="js/scripts.js"></script> -->
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>