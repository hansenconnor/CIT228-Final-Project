<?php include('includes/header.php') ?>


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
