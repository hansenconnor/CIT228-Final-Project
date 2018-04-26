$(document).ready(function(){

    $(".createNote").click(function() {
        $('.note-modal').css('display','block');
        $( "input[name=note_title]" ).focus();
    });

    $(".cancelNote").click(function() {
        $('.note-modal').css('display','none');
            
        // reset form action
        $('#note-form').attr('action', 'scripts/insert_note.php');
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
            e.stopPropagation();  // prevent the parent div from expanding on click
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
            e.stopPropagation();
            return;
        }
      });

      //
      // handle edit note
      //
      $('body').on('click', '.edit-note', function (e) {

        e.stopPropagation();

        // get the ID of the selected note
        var noteID = $(this).attr('id');

        // get the current note title and content
        var noteTitle = $('#' + noteID + " .note-title").text();
        var noteText = $('#' + noteID + " .note-text").text();

        // populate the form with the note content
        $('input[name=note_title]').val(noteTitle);   
        $('textarea[name=note_text]').val(noteText);
        
        // change form action to update_entry.php
        $('#note-form').attr('action', 'scripts/update_entry.php');

        // display the edit note form
        $('.note-modal').css('display','block');
        $( "input[name=note_title]" ).focus();

        $('input[name=note_id]').val(noteID);
      });

      $()
 });