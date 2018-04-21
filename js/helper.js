$(document).ready(function(){

    $(".createNote").click(function() {
        $('.note-modal').css('display','block');
        // alert("clicked");
    });

    $(".cancelNote").click(function() {
        $('.note-modal').css('display','none')
    });

    // handle show note on click
    $(".note-wrapper").click(function(){
        var text = jQuery(this).children(".note-text");
        if ($(text).css('display') === 'none') {
            text.css('display','block');
         }
         else {
             text.css('display','none');
         }
        
    });

    // handle delete note
    $(".delete-note").click(function(){
        var del_id = $(this).attr('id');
        $.ajax({
           type:'POST',
           url:'../scripts/delete_note.php',
           data:'delete_id='+del_id,
           success:function(data) {
                alert("Note deleted successfully");
                location.href = '../dashboard.php';
            }
        });
    });
    
    
 });