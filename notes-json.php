<?php
// start sessopm
session_start(); 

// check if user is logged in
if(!(isset($_SESSION["username"])))
{ 
  // not logged in so redirect to login screen
  echo "<script>location.href = 'index.php';</script>"; 
}
?>

<?php include('includes/header.php'); ?>

<?php 
// store JSON to variable
$json = file_get_contents("JSON/notes.json");

// decode JSON
$decodedJSON = json_decode($json,true);

?>

<!-- Begin HTML markup -->
<section id="note-json">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Notes from JSON</h2>

<?php
foreach ($decodedJSON as $noteObject) {
    $id = $noteObject['id'];
    $title = $noteObject['title'];
        echo '<div class="note-wrapper">';
            echo 'Note ID: ' . $id;
            echo '<br>';
            echo 'Note Title: ' . $title;
        echo '</div>';
};



?>
            </div>
        </div>
    </div>
</section>
<!-- End HTML markup -->

<?php include('includes/footer.php'); ?>
</body>
</html>