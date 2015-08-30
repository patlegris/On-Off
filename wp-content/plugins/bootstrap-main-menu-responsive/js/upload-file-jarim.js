//alert("lort-butt");
jQuery(document).ready(function($) 
{

    
/*CREATE FRAME FOR FILE UPLOAD*/
var file_frame;
// Create the media frame.
// We set multiple to false so only get one image from the uploader
file_frame = wp.media.frames.file_frame = wp.media(
{
    title: $( this ).data( 'uploader_title' ),
    button: 
    {
      text: $( this ).data( 'uploader_button_text' ),
    },
    multiple: false  // Set to true to allow multiple files to be selected
});


/*ADD UPLOAD BUTTONS HANDLER*/
$( "body" ).on( "click", "#upload-file-logo-jarim", function(event)
{
    event.preventDefault();
    /*SET THIS.ID WITH LOCAL STORAGE FOR LATER SET INPUT VALUES IN OPTIONS*/
    var buttonID = $(this).attr('id');
    //alert(buttonID);
    localStorage["logobmmj.imagenowjarim"] = buttonID;
        
    

    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    // Finally, open the modal
    file_frame.open();
    
});//$( "body" ).on( "click", "#upload-file-logo-jarim, #upload-file-header-image-jarim ", function(event)
  
  
//CALL BACK WHEN IMAGE SELECTED IN FRAME
file_frame.on( 'select', function() 
{

    attachmento = file_frame.state().get('selection').first().toJSON();       
    var url = attachmento.url;
    //alert("upload-file-jarim.js = "+url);

    /*CHOOSE THIS BY THIS.ID WITH LOCAL STORAGE FOR LATER SET INPUT VALUES IN OPTIONS*/ 
    var buttonID = localStorage["logobmmj.imagenowjarim"];
    
    if (buttonID =="upload-file-logo-jarim" )
    {//
        //alert(url);
        $('#logo_option_bmmj').val(url);
        $('#upload_preview_logo img').attr('src',url);     
    }
    
//    if (buttonID =="upload-file-header-image-jarim" )
//    {
//        $('#header-image-url-jarim').val(url);
//        $('#upload_preview-header-image-jarim img').attr('src',url);          
//    }
 
    

            //tb_remove();
            //$('#submit_options_form').trigger('click');
            //file_frame.close();

});//END file_frame.on( 'select', function()

});//END jQuery(document).ready(function($)