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

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
<header>
<nav>
          <ul id="main-menu">
            <li><a href="scripts/logout.php">Logout</a></li>  
        </ul>
        </nav>
</header>
<section id="empty-notes">
            <div class="container">
                <div class="row">
                  <!-- TODO populate this field with notes once user is logged in -->
                  <!-- TODO Add initial message 'You don't have any notes yet! -->
                  <!-- Click here to create your first note... -->
                    <div class="col-md-8 offset-md-2 text-center">
                        <img src="assets\icons\shocked.png" alt="shocked emoji" style="width:20%;margin:20px;">
                        <span style="display:block; width:100%;">You don't have any notes yet!</span>
                        <a href="#" class="btn createNote" style="background-color: #2ecc71;">Click here to create your first note</a>
                    </div>
                </div>
            </div>
        </section>
      
        <!-- Hidden modal for note creation (possibly edit/deletion later on...) -->
        <!-- Displayed upon clicking 'create note' button -->
        <section class="note-modal">
            <div class="container">
                <div class="row">
                    <div class="col">
                      <form class="contact-form" action="scripts/insert_note.php" method="POST">
                        <input type="text" name="note_title" placeholder="Note Title">
                        <br>
                        <textarea name="note_text" cols="30" rows="10" placeholder="Begin typing your note..."></textarea>
                        <input  class="btn submit" type="submit"></input>
                        <a href="#" class="btn cancelNote">Cancel</a>
                        <!-- TODO reset input fields when cancel button is clicked -->
                      </form>
                    </div>
                </div>
            </div>
        </section>
        <footer><script src="js/helper.js"></script></footer>
</body>
</html>

      