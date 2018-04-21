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

    $("#clickable").click(function(e) {
        var senderElement = e.target;
        // check if sender is the DIV element e.g.
        // if($(e.target).is("div")) {
        window.location = url;
        return true;
    });

    // handle delete note
    $(".delete-note").click(function(e){
        var del_id = $(this).attr('id');
        event.stopPropagation();  // prevent the parent div from expanding on click
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