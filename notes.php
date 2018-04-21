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


<!-- Check if the user has any notes in the database -->
<!-- if not -> display prompt to create first note -->

<body>
<header>
        <nav>
          <ul id="main-menu">  
            <li><a href="scripts/logout.php">Logout</a></li>
          </ul>
        </nav>
      </header>


      <section id="notes">
        <div class="container" id="results">
            <div class="row">
              <!-- TODO populate this field with notes once user is logged in -->
              <!-- TODO Add initial message 'You don't have any notes yet! -->
              <!-- Click here to create your first note... -->
                <div class="col-md-8 offset-md-2 text-center">
                    <a href="#" class="btn createNote" style="background-color: #2ecc71;">Create Note</a>
                </div>
                <div class="col-md-8 offset-md-2">
                    <span style="display:block; width:100%;"><h2>Notes</h2></span><br>
                </div>
            </div>
            <!-- get all notes and format in html -->
            <script>
                $.ajax({url: "scripts/display_notes.php"}).done(function( html ) {
                        $("#results").append(html);
                    });
            </script>
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
                    <a href="#" class="btn cancelNote" style="background-color: #cf372f;">Cancel</a>
                    <input  class="btn" type="submit"></input>
                    <!-- TODO reset input fields when cancel button is clicked -->
                  </form>
                </div>
            </div>
        </div>
    </section>

    <footer><script src="js/helper.js"></script></footer>
</body>
</html>
