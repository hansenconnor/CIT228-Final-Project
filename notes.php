<!-- start session -->
<?php session_start(); ?>
<!doctype html>
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

  <link rel="stylesheet" href="plugins/css/slicknav.min.css" />
  <script src="plugins/js/jquery.slicknav.min.js"></script>


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
                <li><a href="dashboard.php">Home</a></li>  
                <li class="menu-item">
                    <a href="#">Scripts</a>
                    <ul>
                        <li><a href="#" id="create-json-button">Export JSON</a></li>
                        <li><a href="notes-json.php" id="#">Read JSON</a></li>
                        <li><a href="#">Export XML</a></li>
                        <li><a href="#">Read XML</a></li>
                    </ul>
                </li>
                <li><a href="scripts/logout.php">Logout</a></li>  
            </ul>
        </nav>
    </header>


      <section id="notes">
        <div class="container" style="margin-top:100px;">

            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <a href="#" class="btn createNote" style="background-color: #2ecc71;">Create Note</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8 offset-md-2" id="results">
                    <h2>Notes</h2>
                    <img id="loading-image" src="assets/loaders/spinner.gif" alt="Loading GIF" style="margin:0 auto;">
                    <!-- get all notes and format in html -->
                    <script>
                        $('#loading-image').show();
                        $.ajax({
                            url: "scripts/display_notes.php",
                            cache: false,
                            success: function( html ) {
                                $("#results").append(html);
                            },
                            complete: function(){
                                $('#loading-image').hide();
                            }
                        });
                    </script>
                </div>
            </div>
            
        </div>
    </section>
  
    <!-- Hidden modal for note creation (possibly edit/deletion later on...) -->
    <!-- Displayed upon clicking 'create note' button -->
    <?php include('includes/note-form.html'); ?>

    <?php include('includes/footer.php'); ?>
</body>
</html>
