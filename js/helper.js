$(document).ready(function(){

    $(".createNote").click(function() {
        $('.note-modal').css('display','block');
    });

    $(".cancelNote").click(function() {
        $('.note-modal').css('display','none')
    });



    // handle show note content on click
    $('body').on('click', '.note-wrapper', function () {
        var text = jQuery(this).children(".note-text");
        if ($(text).css('display') === 'none') {
            text.css('display','block');
         }
         else {
             text.css('display','none');
         }
      });

      // handle delete note
       $('body').on('click', '.delete-note', function (e) {
        var answer = confirm("Delete note?")
        if (answer) {
            event.stopPropagation();  // prevent the parent div from expanding on click
            var del_id = $(this).attr('id');
            $.ajax({
               type:'POST',
               url:'./scripts/delete_note.php',
               data:'delete_id='+del_id,
               success:function(data) {
                    alert("Note deleted successfully");
                    location.href = 'dashboard.php';
                }
            });
        }
        else {
            event.stopPropagation();
            return;
        }
      });

      // handle edit note
      $('body').on('click', '.edit-note', function (e) {
        
        // TODO display note edit form with submit button which calls the edit_entry script
        

        
        
        
        //var answer = confirm("Delete note?")

        // get the id of the clicked note-title
        // var id = $(this).attr('id');

        // when the edit button is clicked, the note title and content with matching id 
        // should become editable
        // $('.note-title#' + id).attr('contenteditable', 'true');
        // $('.note-title#' + id).focus();

        // append a 'done' button to the div which calls the edit_entry script
        
        // the note wrapper to append the button to
        // $('.note-wrapper#' + id).append("Done Editing Button");
      });
 });