<?php include('includes/header.php') ?>
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
        <?php include('includes/note-form.html'); ?>

        <footer><script src="js/helper.js"></script></footer>
</body>
</html>

      