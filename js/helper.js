$(document).ready(function(){


    $(".createNote").click(function() {
        $('.note-modal').css('display','block');
        alert("clicked");
    });

    $(".cancelNote").click(function() {
        $('.note-modal').fadeOut(350);
    });

    
 });