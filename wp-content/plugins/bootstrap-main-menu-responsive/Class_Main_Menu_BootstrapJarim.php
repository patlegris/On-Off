<?php

class Class_Main_Menu_BootstrapJarim 
{

    protected $option_name = 'bootstrap_main_menu_option';
	
    protected $data = array
    (
        'menu_name_option_bmmj' => '',
        'menu_appareance_option_bmmj' => 'navbar navbar-inverse',
        'menu_register_option_bmmj' => 1,
        'menu_login_option_bmmj' => 1,
        'menu_search_option_bmmj' => 1,        
        'menu_sitename_option_bmmj' => 1,
        'menu_header_visible_option_bmmj' => 0
        
    );

    public function __construct() 
    {

//        // ACTIVATION
//        register_activation_hook(MY_PLUGIN_FILE_JARIM_BOOTSTRAP_MENU_JARIM, array($this, 'activate'));        
//        // DEACTIVATION
//        register_deactivation_hook(MY_PLUGIN_FILE_JARIM_BOOTSTRAP_MENU_JARIM, array($this, 'deactivate'));
//
// 
        //IF NOT ADMINISTRATION PAGES
        if ( ! is_admin() ) 
        {
            //PRINT DIV IN HEADER WITH MENU VALUES FOR JS CHECK
            add_action('get_header', array($this,'load_div_for_js_check'));
            //PRINT DIV IN HEADER WITH MENU VALUES FOR JS CHECK
            add_action('get_footer', array($this,'load_js_for_div_check'));
            
            //LOAD SCRIPTS-CSS AT HEADER
            add_action('get_header',array($this, 'load_js_css_BootstrapJarim'));
            $menu = $this->menu_get_by_name_if_not_exist_get_primary ();
            
            //IF MENU NAME OR PRIMARY MENU JUST DO IT BOOTSTRAP / IF NOT, DO NOTHING...
            if($menu)
            {
                
                add_action('get_header',array($this, 'load_bootstrap_menus'));

            }//END OF IF MENU EXISTS
            else
            {//IF NO MENU NAVIGATION AND NO MENU NAME -> JUST SHOW HEADER AND SET OPTION TO SHOW HEADER
                $data = array('menu_header_visible_option_bmmj' => 1);   
                //bootstrap_main_menu_option == 1 -> show / != 1 -> hidden
                update_option( 'bootstrap_main_menu_option', $data );

            }


            
        }
        
//        //INITIALIZE CONSTANTS
//        $this->initializeConstants();
//        
//        // ADD PAGES IN ADMIN SECTION
//        add_action('admin_init', array($this, 'admin_init'));
//        add_action('admin_menu', array($this, 'add_page'));	


    }//END public function __construct() 

    
//LOAD SCRIPTS-CSS 
public function load_js_css_BootstrapJarim() { // load external file  
    

        // Default WordPress jQuery  
        wp_enqueue_script( 'jquery' ); 
        

        
        //BOOTSTRAP ORIGINAL
        wp_register_script('BootstrapJarim-jq', MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM."js/bootstrap.min.js", array('jquery') );
        wp_enqueue_script('BootstrapJarim-jq');
        // AJAX OBJECT  ajax_object.ajax_url AND ajax_object.we_value
	wp_localize_script( 'BootstrapJarim-ajax-object-jq', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
        // MY CSS
        
                
        
        wp_enqueue_style('style_BootstrapJarim', MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM."css/bootstrap.min.css" ); 
        wp_enqueue_style('style_BootstrapJarim2', MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM."css/bootstrap-keep-colors-jarim.css" ); 

}  
 
public function load_js_for_div_check()
{
        // OUR SCRIPTS
        wp_register_script('bootstrap-main-menu-jarim-jq', MY_PLUGIN_URL_BOOTSTRAP_MENU_JARIM."js/bootstrap-main-menu-jarim.js", array('jquery') );
        wp_enqueue_script('bootstrap-main-menu-jarim-jq');    
}
public function menu_get_by_name_if_not_exist_get_primary ()
{
/*RETURN MENU OBJECT BY NAME
 * IF MENU DOES NOT EXIST BY NAME, RETURN THE PRIMARY MENU
 * IF PRIMARY DOES NOT EXISTS, RETURN EMPTY?
*/   
    
    $options = get_option('bootstrap_main_menu_option');
    $menu_name_option_bmmj = $options['menu_name_option_bmmj'];  

    //GET MENU OBJECT BY MENU NAME (COULD BE slug OR id) 
     $menu_name = $menu_name_option_bmmj;
     $menu = wp_get_nav_menu_object($menu_name );
     //echo '<pre>MY ARRRAY'; print_r($menu); echo '<pre/>';    

    //IF NO MENU NAME
    if($menu_name=="")
    {
    //GET MENU OBJECT BY LOCATION primary DEACTIVATED NOW
        $menu_name = 'primary';
        $locations = get_nav_menu_locations();
        $menu_id = $locations[ $menu_name ];
        //echo "<pre>MENU ID $menu_id<pre/>";
        $menu = wp_get_nav_menu_object( $menu_id  ); 
    }
    
    return $menu;

}


public function load_div_for_js_check() { 
//ECHO DIV CONTAINING FLAG ($menu_header_visible_option_bmmj) FOR JS CHECK - 
//$menu_header_visible_option_bmmj == 1 -> SHOW HEADER
//$menu_header_visible_option_bmmj != 1 -> HIDE HEADER
    
    $options = get_option('bootstrap_main_menu_option');    
    $menu_header_visible_option_bmmj =$options['menu_header_visible_option_bmmj'];
    echo '
    <div  id="my-header-visible-bootstrap-option" style ="display:none;" >'.$menu_header_visible_option_bmmj.'</div>';
    
}


public function load_bootstrap_menus() {  
//LOAD BOOTSTRAP MENUS IF MENU NAVIGATION OR BOOTSTRAP-MENU-NAME(GIVEN IN ADMIN OPTIONS FOR THIS PLUGIN) EXISTS

    $blog_info_bootstrap = esc_attr( get_bloginfo( 'name', 'display' ) );
    $blog_description_bootstrap = get_bloginfo( 'description' );
    $blog_name_bootstrap = get_bloginfo( 'name' );
    $home_url_bootstrap = esc_url( home_url( '/' ));
    $login_url_bootstrap = wp_login_url( home_url() );
    $register_url_bootstrap =  wp_registration_url();


    $options = get_option('bootstrap_main_menu_option');
    $menu_name_option_bmmj = $options['menu_name_option_bmmj'];  
    $menu_appareance_option_bmmj = $options['menu_appareance_option_bmmj'] ; 
    $menu_register_option_bmmj = $options['menu_register_option_bmmj'] ; 
    $menu_login_option_bmmj = $options['menu_login_option_bmmj'] ;  
    $menu_search_option_bmmj = $options['menu_search_option_bmmj'] ; 
    $menu_sitename_option_bmmj = $options['menu_sitename_option_bmmj'] ;     
    $logo_option_bmmj = esc_url($options['logo_option_bmmj']);
    $logo_width_option_bmmj = $options['logo_width_option_bmmj']; 
    $logo_height_option_bmmj = $options['logo_height_option_bmmj']; 
    $logo_show_option_bmmj= $options['logo_show_option_bmmj'];
    
    if ($logo_width_option_bmmj)
    {
        $logo_width_option_bmmj ="width:".$logo_width_option_bmmj."px;";
            
    }
    if ($logo_height_option_bmmj)
    {
        $logo_height_option_bmmj ="height:".$logo_height_option_bmmj."px;";
            
    }

    //$menu_header_visible_option_bmmj =$options['menu_header_visible_option_bmmj'];
	
	
     if([$menu_appareance_option_bmmj=="navbar navbar-default navbar-fixed-top"|| $menu_appareance_option_bmmj=="navbar navbar-inverse navbar-fixed-top"] && is_user_logged_in())
    {//IF USSER LOGGED IN SET TOP-MARGIN TO SEE THE MENU ADMIN 
         
         echo '<style>
             .navbar-fixed-top{margin-top:30px !important;}</style> ';        
    }   

    echo '

    <style>
        #masthead{display:none;}
    </style>   

  <nav class="'.$menu_appareance_option_bmmj.'">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <!--ORIGINAL <a class="navbar-brand" href="#">WebSiteName</a>-->';
    
    if ($logo_option_bmmj && $logo_show_option_bmmj==1)
    {
        echo '<a class=""  style="float:left;padding:10px;" href="'.$home_url_bootstrap.'" title="'.$blog_info_bootstrap.' '.$blog_description_bootstrap.'" rel="home">
        '."<img style='$logo_width_option_bmmj $logo_height_option_bmmj' src='$logo_option_bmmj' >".'
        </a>';
    }
   
    
   

    if ($menu_sitename_option_bmmj)
    {
        echo '<a class="navbar-brand"  style="text-transform:uppercase;" href="'.$home_url_bootstrap.'" title="'.$blog_info_bootstrap.' '.$blog_description_bootstrap.'" rel="home">
        '.$blog_name_bootstrap.'
        </a>';
    }
    echo '</div>
    <div class="collapse navbar-collapse" id="myNavbar">';
        


    //GET MENU OBJECT
    $menu = $this->menu_get_by_name_if_not_exist_get_primary ();
    
    
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    // echo '<pre>MY ARRRAY'; print_r($menuitems); echo '<pre/>';
    $count = 0;
    $counter_level_1 = 0;
    $submenu = false;
    $last_item_level_1_id= "";
    $menu_parents_all_array = array();
    $allMenusArrayCOUNTER = count($menuitems);

    //BEGYNDER HTML OUTPUT
    echo '<ul class="nav navbar-nav">';
    //LOOP ALL MENU ITEMS - GET PARENTS 
    foreach( $menuitems as $item )
    {
        $menu_item_parent_id = $item->menu_item_parent;
        if ($menu_item_parent_id)
        {
            if (!(in_array($menu_item_parent_id, $menu_parents_all_array)))
            {
                array_push($menu_parents_all_array,$menu_item_parent_id);
            }
        }
    }

    //LOOP ALL MENU ITEMS FOR primary menu
    foreach( $menuitems as $item )
    {
        // GET PAGE ID
        $menu_page_id = get_post_meta( $item->ID, '_menu_item_object_id', true );

        // GET PAGE OBJECT
        $page = get_page( $menu_page_id );

        // GET MENU ID
        $menu_item_id = $item->ID;

        //CHECK IF MENU IS IN MENU PARENTS ARRAY
        if ((in_array($menu_item_id, $menu_parents_all_array)))
        {
            $flag_parent_menu = true;
        }
        else
        {
            $flag_parent_menu = false;
        }
        // GET MENU PARENT
        $menu_item_parent_id = $item->menu_item_parent;
        // GET MENU TITLE
        $menu_title = $item->title;
        //GET MENU URL
        $menu_url = $item->url;
        //GET MENU PARENT NEXT
        $menu_next_items_id = $menuitems[ $count + 1 ]->menu_item_parent;				
        
        
        //IF LEVEL 0
        if ( !$menu_item_parent_id )
        {
            $parent_level_0_id = $item->ID;	
            $parent_menu_level_0 = true;

            if($flag_parent_menu)
            { 
                echo "<li class='dropdown menu-level-0'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>$menu_title<span class='caret'></span></a>
                        <ul class='menu-level-0 dropdown-menu'>";
            }
            else
            {
                echo "<li class='menu-level-0'>
                        <a href='$menu_url' class='title'>$menu_title</a>";
            }
        } 

        //IF SUBMENU LEVEL 1
        if ( $parent_level_0_id == $menu_item_parent_id ||  $last_item_level_1_id == $menu_item_parent_id && !$parent_menu_level_0)
        {

            if ( !$submenu )
            {
                    //FLAG submenu = true
                    $submenu = true;
            }

            $counter_level_1 = $counter_level_1 +1;

            if($flag_parent_menu)
            { 
                echo "<li class='dropdown menu-level-1'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>$menu_title<span class='caret'></span></a>
                        <ul class='menu-level-1 dropdown-menu'>";
            }
            else
            {
                echo "          
                        <li class='menu-level-1'>
                            <a href='$menu_url' class='title'>$menu_title</a>
                        </li>";  
            }


        }

        //CLOSE LEVEL 1 - ul ->IF NEXT ITEM HAS ANOTHER PARENT AND SUBMENU FLAG IS TRUE  
        if ( $menu_next_items_id != $parent_level_0_id && $submenu  )
        {

            echo "</ul>";
            $submenu = false;
            $counter_level_1 = 0;
        }


        //CLOSE LEVEL 0 - li->IF NEXT ITEM HAS ANOTHER PARENT  
        if ( $menu_next_items_id != $parent_level_0_id )
        {
                echo "</li>";

        }

        //RESET  FLAGS
        $parent_menu_level_0 = false;
        $submenu = false;
        $count++;	

    }

    if ($menu_search_option_bmmj=="1")
    {
        echo '<li>'.get_search_form().'</li>';
    }   

    echo '</ul>';


    if ($menu_register_option_bmmj=="1" || $menu_login_option_bmmj=="1")
    {

        echo '<ul class="nav navbar-nav navbar-right">';
        if ($menu_register_option_bmmj=="1")
        {
            echo ' <li><a href="'.$register_url_bootstrap.'"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
        }
        if ( $menu_login_option_bmmj=="1")
        {
            echo '<li><a href="'.$login_url_bootstrap.'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        }            

        echo '  </ul>';    

    }


    echo '</div>
        </div>
      </nav>'; 

    if($menu_appareance_option_bmmj=="navbar navbar-default navbar-fixed-top"|| $menu_appareance_option_bmmj=="navbar navbar-inverse navbar-fixed-top")
    {//FILL THE SPACE OF THE MENU INSERTING A FILL DIV
         
         echo '<div id="fill-bootstrap-menu-jarim" style="clear:both;width:100%;height:18px;background-color:#101010;" ></div> ';        
    }


}  //END OF load_bootstrap_menus
    
}//END Class_Install_LdvJarim
