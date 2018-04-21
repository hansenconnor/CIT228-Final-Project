<!-- TODO add buttons to create, edit, and remove notes -->

      <!-- Each note will have the following properties: title, date created, content, and priority. 
           Priorities will be determined by a dropdown selector with the following options: 
           None (default), low, medium, and high. 
           Priorities will be represented by a specific color when viewed on the dashboard. 
      -->

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
                        <input type="text" name="note_text" placeholder="Begin typing your note...">
                        <a href="#" class="btn cancelNote" style="background-color: #cf372f;">Cancel</a>
                        <input  class="btn" type="submit"></input>
                        <!-- TODO reset input fields when cancel button is clicked -->
                      </form>
                    </div>
                </div>
            </div>
        </section>