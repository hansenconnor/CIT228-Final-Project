$(document).ready(function(){

    $(".createNote").click(function() {
        $('.note-modal').css('display','block');
    });

    $(".cancelNote").click(function() {
        $('.note-modal').css('display','none')
    });

    // handle show note content on click

    $('.note-wrapper').click(function(){
        alert("clicked");
    });

    $('body').on('click', '.note-wrapper', function () {
        var text = jQuery(this).children(".note-text");
        if ($(text).css('display') === 'none') {
            text.css('display','block');
         }
         else {
             text.css('display','none');
         }
      });

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

    // handle delete note
    
    
 });