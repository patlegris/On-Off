<?php

class Class_Upload_MMBJ 
{



public function __construct() 
{
    $pageOptionsName = "bootstrap_main_menu_list_option";
    if ($this->checkIsYourPageOptions($pageOptionsName))
    {
        add_action('admin_init',array($this, 'load_upload_file_mmbj') );
    }


}//END public function __construct() 

    
public function checkIsYourPageOptions($pageOptionsName) 
{
/*CALL
$pageOptionsName = "foodpushers-front-appareance-list-options";
if (checkIsYourPageOptions($stringExist))
{
*/
    $Path=$_SERVER['REQUEST_URI'];
    //echo "/ Path= $Path";
    $stringExist =  stripos($Path,$pageOptionsName);    
    return $stringExist;
}

public function load_upload_file_mmbj() 
{ // load external file  
    //IN wp_enqueue_media IS ALL THE NECCESARY TO MAKE WORKS OUR FILE UPLOAD SCRIPT
    wp_enqueue_script('jquery');
    wp_enqueue_media();        
    //OUR FILE UPLOAD SCRIPT
    wp_register_script('upload-file-jarim', MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM.'js/upload-file-jarim.js', array('jquery') );
    wp_enqueue_script('upload-file-jarim');
}  




    
}//END Class_Install_LdvJarim
