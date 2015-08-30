<?php
/*
Plugin Name: bootstrap-main-menu-responsive
Plugin URI: http://www.jarimos.dk/websjarim/bootstrap-main-menu-responsive/
Description: Main menu bootstrap responsive + collapse. You can Choose between fixed at top, fixed at bottom, normal, inverse, etc. 
Author: Jarim
Version: 1.3
Author URI: http://www.jarimos.dk
License: GPLv2
*/


//PATHS
//PLUGIN DIR
if ( !defined('MY_PLUGIN_DIR_BOOTSTRAP_MENU_JARIM') )
define( 'MY_PLUGIN_DIR_BOOTSTRAP_MENU_JARIM',  plugin_dir_path( __FILE__ ) ); 
if ( !defined('MY_PLUGIN_FILE_JARIM_BOOTSTRAP_MENU_JARIM') )
define( 'MY_PLUGIN_FILE_JARIM_BOOTSTRAP_MENU_JARIM', __FILE__  ); 
//PLUGIN URL
if ( !defined('MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM') )
define( 'MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM',plugin_dir_url(__FILE__) ); 
//PLUGIN BASENAME
if ( !defined('MY_PLUGIN_BASENAME_BOOTSTRAP_MENU_JARIM') )
define( 'MY_PLUGIN_BASENAME_BOOTSTRAP_MENU_JARIM',plugin_basename(__FILE__) ); 




//CALL CLASSES

//INSTALL INSTALLATION CLASS - ADMIN FUNCTIONALITY
require MY_PLUGIN_DIR_BOOTSTRAP_MENU_JARIM . 'Class_Install_BootstrapJarim.php';
new Class_Install_BootstrapJarim();

//BOOTSTRAP FUNCTIONALITY STARTS HERE :)
require MY_PLUGIN_DIR_BOOTSTRAP_MENU_JARIM . 'Class_Main_Menu_BootstrapJarim.php';
new Class_Main_Menu_BootstrapJarim();

//BOOTSTRAP UPLOAD FILE :)
require MY_PLUGIN_DIR_BOOTSTRAP_MENU_JARIM . 'Class_Upload_MMBJ.php';
new Class_Upload_MMBJ();
