//alert("lortttttt");

jQuery(document).ready(function($) 
{

    //alert(hide_header.menu_header_visible_option_bmmj);

    if (hide_header.menu_header_visible_option_bmmj!="1")
    {

        //$("#primary-navigation").html("");
        //$(".menu-mainmenu-container").html("");
        //$("#masthead").html("");   
        $("#masthead").css("display","none"); 
    }
    else
    {
        $("#masthead").css("display","block");
        
    }

    var navigationHeight= $("#nav-bootstrap-jarim").height()/2;
    //alert(navigationHeight);
    $("#fill-bootstrap-menu-jarim").height(navigationHeight);
    
    
    

  
});   
