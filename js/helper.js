$(document).ready(function(){
    

    $(function(){
        $('#main-menu').slicknav({
            removeIds: false,
            prependTo: "header"
        });
    });

    $(".createNote").click(function() {
        $('.note-modal').fadeIn(200);
        $( "input[name=note_title]" ).focus();
    });

    $(".cancelNote").click(function() {
        $('.note-modal').fadeOut(200);
            
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
        $('.note-modal').fadeIn(200);
        $( "input[name=note_title]" ).focus();

        $('input[name=note_id]').val(noteID);
    });

    // handle export JSON
    $('body').on('click', '#create-json-button', function(){

        displayLoader("Writing JSON...");

        // wait 1.5 seconds 
        // this is just to provide more time to demonstrate loader icon
        setTimeout(function(){
            $.ajax({
                type:'POST',
                url:'./scripts/create_json.php',
                    success: function(){
                        $('#loader-modal-title').text("JSON written successfully!");
                        $('#spinner').replaceWith('<img src="assets/icons/checked.png" width="50px" alt="Checked Icon" />');
                        
                        // reload page
                        location.href = 'dashboard.php';
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("some error");
                    }
            });
        }, 1500);
        
    });

    $("#signup-form").submit(function(event){

        displayLoader("Creating account...");

        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        setTimeout(function(){
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ //
                // alert("done");
                //$('#spinner').replaceWith('<img src="assets/icons/checked.png" width="50px" alt="Checked Icon" />');
                $('#signup-form').append(response);
            });
        }, 1500);
    });

    function displayLoader (loadingMessage){
        // append the loader to the DOM
        $('body').append('<div class="modal-container"><div class="container"><div class="row"><div class="col-md-6 offset-md-3"><div id="loader-modal"><img id="spinner" src="assets/loaders/spinner.gif" width="50px" alt="Loading Animation" /><span id="loader-modal-title">'+ loadingMessage +'</span></div></div></div></div></div>');
    };
 });