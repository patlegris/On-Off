<?php

class Class_Install_BootstrapJarim 
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
        'menu_header_visible_option_bmmj' => 0,
        'logo_option_bmmj' => '',
        'logo_show_option_bmmj' => 1,        
        'logo_height_option_bmmj' => '',
        'logo_width_option_bmmj' => ''
                     
                    
                           
    );

    public function __construct() 
    {

        // ACTIVATION
        register_activation_hook(MY_PLUGIN_FILE_JARIM_BOOTSTRAP_MENU_JARIM, array($this, 'activate'));        
        // DEACTIVATION
        register_deactivation_hook(MY_PLUGIN_FILE_JARIM_BOOTSTRAP_MENU_JARIM, array($this, 'deactivate'));

 
        //INITIALIZE OPTIONS
        $this->initializeOptionsProtected();
        //INITIALIZE CONSTANTS
        $this->initializeConstants();
        
        // ADD PAGES IN ADMIN SECTION
        $this->settings_menu_link_beside_plugin_name_in_plugins();
        // ADD PAGES IN ADMIN SECTION
        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_menu', array($this, 'add_page'));	


    }//END public function __construct() 

    public function activate() 
    {
        //SET OPTIONS TO DEAFAULT ON ACTIVATION
        update_option($this->option_name,$this->data);
    }// END activate() 

    
    public function deactivate() 
    {
        delete_option($this->option_name);
    }
    
    public function initializeOptionsProtected() 
    {
        $options = get_option($this->option_name);

        if ($options)
        {   
            $this->data['menu_name_option_bmmj'] = $options['menu_name_option_bmmj'];  
            $this->data['menu_appareance_option_bmmj'] = $options['menu_appareance_option_bmmj'] ; 
            $this->data['menu_register_option_bmmj'] = $options['menu_register_option_bmmj'] ; 
            $this->data['menu_login_option_bmmj'] = $options['menu_login_option_bmmj'] ;  
            $this->data['menu_search_option_bmmj'] = $options['menu_search_option_bmmj'] ; 
            $this->data['menu_sitename_option_bmmj'] = $options['menu_sitename_option_bmmj'] ;            
            $this->data['menu_header_visible_option_bmmj'] = $options['menu_header_visible_option_bmmj'] ;       
            $this->data['logo_option_bmmj'] = $options['logo_option_bmmj'] ;  
            $this->data['logo_show_option_bmmj'] = $options['logo_show_option_bmmj'] ;            
            $this->data['logo_height_option_bmmj'] = $options['logo_height_option_bmmj'] ;       
            $this->data['logo_width_option_bmmj'] = $options['logo_width_option_bmmj'] ; 
                    
                    
                    
        }
        else
        {
            update_option($this->option_name,$this->data);
        }
   
    }//END public initializeOptionsProtected()
    
    public function initializeConstants() 
    {
        //CONSTANTS CANT BE REDEFINED- THEY CAN BE DEFINED ONLY ONCE
        
        
        //PROTECTED DATA CONSTANTS
//        if ( !defined('BMMJ_MENU_NAME') )
//        define( 'BMMJ_MENU_NAME', $this->data['menu_name_option_bmmj'] ); 
//        if ( !defined('BMMJ_APPAREANCE') )
//        define( 'BMMJ_APPAREANCE', $this->data['menu_appareance_option_bmmj'] ); 
//        if ( !defined('BMMJ_RESGISTER') )
//        define( 'BMMJ_RESGISTER', $this->data['menu_register_option_bmmj'] ); 
//        if ( !defined('BMMJ_LOGIN') )
//        define( 'BMMJ_LOGIN', $this->data['menu_login_option_bmmj'] ); 
//        if ( !defined('BMMJ_SEARCH') )
//        define( 'BMMJ_SEARCH', $this->data['menu_search_option_bmmj'] ); 
//        if ( !defined('BMMJ_SITE_NAME') )
//        define( 'BMMJ_SITE_NAME', $this->data['menu_sitename_option_bmmj'] ); 
//        if ( !defined('BMMJ_HEADER') )
//        define( 'BMMJ_HEADER', $this->data['menu_header_visible_option_bmmj'] );  
//        if ( !defined('BMMJ_LOGO') )
//        define( 'BMMJ_LOGO', $this->data['logo_option_bmmj'] ); 
        
        //OTHER CONSTANTS  
        //DEAFULT NAVIGATION
        if ( !defined('BMMJ_TYPE_DEFAULT') )
        define( 'BMMJ_TYPE_DEFAULT', "navbar navbar-default" ); 
        if ( !defined('BMMJ_TYPE_FIXED_TOP_BAR') )
        define( 'BMMJ_TYPE_FIXED_TOP_BAR', "navbar navbar-default navbar-fixed-top" );       
        if ( !defined('BMMJ_TYPE_FIXED_BOTTOM') )
        define( 'BMMJ_TYPE_FIXED_BOTTOM', "navbar navbar-default navbar-fixed-bottom" );         
        if ( !defined('BMMJ_TYPE_DARK') )
        define( 'BMMJ_TYPE_DARK', "navbar navbar-inverse" );         
        if ( !defined('BMMJ_TYPE_DARK_FIXED_TOP_BAR') )
        define( 'BMMJ_TYPE_DARK_FIXED_TOP_BAR', "navbar navbar-inverse navbar-fixed-top" );        
        if ( !defined('BMMJ_TYPE_DARK_FIXED_BOTTOM_BAR') )
        define( 'BMMJ_TYPE_DARK_FIXED_BOTTOM_BAR', "navbar navbar-inverse navbar-fixed-bottom" );

        
        
    }//END public initializeConstants()

    
    
    
    
    public function admin_init() 
    {
        //register_setting() ALLOW US TO SEND OUR OPTIONS THROUGH A VALIDATION FUNCTION OF OUT OWN SO WE CHECK ALL ERRORS. HE WE USE OR FUNCTION validate
        // White list our options using the Settings API
        // A whitelist: Those on the list will be accepted, approved or recognized. Whitelisting is the reverse of blacklisting
        //register settings that will be shown on the default WP settings pages. Once the setting is registered 
        //you can add it to an existing section with add_settings_field() or create a new section with add_settings_section() and add it to that.
        register_setting('bootstrap_main_menu_list_option', $this->option_name, array($this, 'validate'));
    }

    
    
 
    
    
public function settings_menu_link_beside_plugin_name_in_plugins()
{
//CREATE LITTLE MENU INSIDE PLUGINS, UNDER THE PLUGIN NAME, BESIDE ACTIVATE,DEACTIVATE
    
    if (function_exists('add_plugin_settings_link_BootstrapJarim')) 
    {
        add_filter('plugin_action_links_'.MY_PLUGIN_BASENAME_BOOTSTRAP_MENU_JARIM, 'add_plugin_settings_link_BootstrapJarim'); 
    } else 
    {
        function add_plugin_settings_link_BootstrapJarim( $links ) 
        {
            $links[] = '<a href="' .
            admin_url( 'options-general.php?page=bootstrap_main_menu_list_option' ) .
            '">' . __('Settings') . '</a>';
            return $links;
        }

        add_filter('plugin_action_links_'.MY_PLUGIN_BASENAME_BOOTSTRAP_MENU_JARIM, 'add_plugin_settings_link_BootstrapJarim'); 
    }
}
    
    
    
    
    
    
    // Add entry in the settings menu
    public function add_page() 
    {
        //JARIM NOTE: array($this, 'options_do_page')IS THE LAST PARAMETER AND SIMPLY CALL A FUNCTION FROM THE CLASS IN THIS WIERD WAY, JUST TO GET THE OUTPUT IN THE ADMIN SIDE
        //add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);  
        //SETTINGS
        add_options_page('bootstrap_M_menu', 'bootstrap_M_menu', 'manage_options', 'bootstrap_main_menu_list_option', array($this, 'options_do_page'));
        //APPAREANCE
        //add_submenu_page( 'themes.php', 'bootstrap_M_menu', 'bootstrap_M_menu', 'manage_options', 'bootstrap_main_menu_list_option', array($this, 'options_do_page'));

    }
	

    // PRINT ADMIN PAGE WITH OPTIONS
    public function options_do_page() 
    {
        $options = get_option($this->option_name);


        ?>
        <div class="wrap">

            <h2>Bootstrap main menu options</h2>
            <form method="post" action="options.php">
                <?php
                //settings fields Output nonce, action, and option_page fields for a settings page. 
                //Please note that this function must be called inside of the form tag 
                //for the options page.
                settings_fields('bootstrap_main_menu_list_option'); 
  
                //settings_errors();
                
                
                ?>

                <h3>Required options</h3>

                <table class="form-table">
					
                    <tr valign="top"><th scope="row">Menu name</th>
                        <!--
                        NOTE JARIM: REMARK THE INPUT NAME IS name="<php echo $this->option_name?>[menu_name_option_bmmj]"
                        -->
                        <td><input type="text" name="<?php echo $this->option_name; ?>[menu_name_option_bmmj]" value="<?php echo $options['menu_name_option_bmmj']; ?>" /></td>
                    </tr>
                    
                    



                    <tr valign="top"><th scope="row">Appareance</th>
                        <td>
                            <select name="<?php echo $this->option_name; ?>[menu_appareance_option_bmmj]">
                              <option value="<?php echo BMMJ_TYPE_DEFAULT;?>" <?php if ( $options['menu_appareance_option_bmmj'] == BMMJ_TYPE_DEFAULT ) echo 'selected="selected"'; ?>><?php echo BMMJ_TYPE_DEFAULT;?></option>
                              <option value="<?php echo BMMJ_TYPE_FIXED_TOP_BAR;?>" <?php if ( $options['menu_appareance_option_bmmj'] == BMMJ_TYPE_FIXED_TOP_BAR ) echo 'selected="selected"'; ?>><?php echo BMMJ_TYPE_FIXED_TOP_BAR;?></option>
                              <option value="<?php echo BMMJ_TYPE_FIXED_BOTTOM;?>" <?php if ( $options['menu_appareance_option_bmmj'] == BMMJ_TYPE_FIXED_BOTTOM ) echo 'selected="selected"'; ?>><?php echo BMMJ_TYPE_FIXED_BOTTOM;?></option>
                              <option value="<?php echo BMMJ_TYPE_DARK;?>" <?php if ( $options['menu_appareance_option_bmmj'] == BMMJ_TYPE_DARK ) echo 'selected="selected"'; ?>><?php echo BMMJ_TYPE_DARK;?></option>
                              <option value="<?php echo BMMJ_TYPE_DARK_FIXED_TOP_BAR;?>" <?php if ( $options['menu_appareance_option_bmmj'] == BMMJ_TYPE_DARK_FIXED_TOP_BAR ) echo 'selected="selected"'; ?>><?php echo BMMJ_TYPE_DARK_FIXED_TOP_BAR;?></option>
                              <option value="<?php echo BMMJ_TYPE_DARK_FIXED_BOTTOM_BAR;?>" <?php if ( $options['menu_appareance_option_bmmj'] == BMMJ_TYPE_DARK_FIXED_BOTTOM_BAR ) echo 'selected="selected"'; ?>><?php echo BMMJ_TYPE_DARK_FIXED_BOTTOM_BAR;?></option>
                            </select>   
                        </td>
                    </tr>	

                    
   
                    <tr valign="top"><th scope="row">Logo upload</th>
                        <td>
                            <!--BUTTON FOR UPLOAD-->
                            <button  id="upload-file-logo-jarim">Upload Logo</button>
                            <br><br>
                            <!--PREVIEW FOR UPLOAD-->
                            <div id="upload_preview_logo" style="max-height:200px;">
                                <img style="max-width:200px;" src="<?php echo esc_url( $options['logo_option_bmmj'] ); ?>" />
                            </div>                            
                        </td>  
                    </tr>                    
                    
 
                    <tr valign="top"><th scope="row">Logo url:</th>
                        <td>
                            <!--INPUT FOR UPLOAD-SAVING -->
                            <input type="text" id="logo_option_bmmj" name="<?php echo $this->option_name; ?>[logo_option_bmmj]" value="<?php echo $options['logo_option_bmmj']; ?>" />
                        </td>
                    </tr>	                          
                    
                    
                    <tr valign="top"><th scope="row">(optional) Logo width: input only numbers</th>
                        <td><input type="text" name="<?php echo $this->option_name; ?>[logo_width_option_bmmj]" value="<?php echo $options['logo_width_option_bmmj']; ?>" /></td>
                    </tr>                    
                    <tr valign="top"><th scope="row">(optional) Logo height: input only numbers</th>
                        <td><input type="text" name="<?php echo $this->option_name; ?>[logo_height_option_bmmj]" value="<?php echo $options['logo_height_option_bmmj']; ?>" /></td>
                    </tr> 

                    
                    <tr valign="top">
                        <td>
                            <h3>Check to show</h3>
                        </td>
                    </tr>	
                    <tr valign="top"><th scope="row">Show Logo</th>
                        <td>
                            <input type='checkbox' name="<?php echo $this->option_name; ?>[logo_show_option_bmmj]" value='1'  <?php if ( 1 == $options['logo_show_option_bmmj'] ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>
                    <tr valign="top"><th scope="row">Show Login</th>
                        <td>
                            <input type='checkbox' name="<?php echo $this->option_name; ?>[menu_login_option_bmmj]" value='1'  <?php if ( 1 == $options['menu_login_option_bmmj'] ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>	                   
                    <tr valign="top"><th scope="row">Show Register</th>
                        <td>
                            <input type='checkbox' name="<?php echo $this->option_name; ?>[menu_register_option_bmmj]" value='1'<?php if ( 1 == $options['menu_register_option_bmmj'] ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>
                    <tr valign="top"><th scope="row">Show Search Bar</th>
                        <td>
                            <input type='checkbox' name="<?php echo $this->option_name; ?>[menu_search_option_bmmj]" value='1'<?php if ( 1 == $options['menu_search_option_bmmj'] ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>
                    <tr valign="top"><th scope="row">Show Site Name</th>
                        <td>
                            <input type='checkbox' name="<?php echo $this->option_name; ?>[menu_sitename_option_bmmj]" value='1' <?php if ( 1 == $options['menu_sitename_option_bmmj'] ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr> 
                    <tr valign="top"><th scope="row">Show Header</th>
                        <td>
                            <input type='checkbox' name="<?php echo $this->option_name; ?>[menu_header_visible_option_bmmj]" value='1' <?php if ( 1 == $options['menu_header_visible_option_bmmj'] ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>                      
                    
                    
                    
	
                </table>
                <p class="submit">
                    <input type="submit" class="" value="<?php _e('Save Changes') ?>" />
                </p>
            </form>
        </div>
        <?php
    }//END options_do_page()

    
    
    public function validate($input) 
    {

        $valid = array();
        $valid['menu_name_option_bmmj'] = sanitize_text_field($input['menu_name_option_bmmj']);
        $valid['menu_appareance_option_bmmj'] = sanitize_text_field($input['menu_appareance_option_bmmj']);
        $valid['menu_register_option_bmmj'] = sanitize_text_field($input['menu_register_option_bmmj']);
        $valid['menu_login_option_bmmj'] = sanitize_text_field($input['menu_login_option_bmmj']);		
        $valid['menu_search_option_bmmj'] = sanitize_text_field($input['menu_search_option_bmmj']);
        $valid['menu_sitename_option_bmmj'] = sanitize_text_field($input['menu_sitename_option_bmmj']);		
        $valid['menu_header_visible_option_bmmj'] = sanitize_text_field($input['menu_header_visible_option_bmmj']);  
        $valid['logo_option_bmmj'] = sanitize_text_field($input['logo_option_bmmj']); 
        $valid['logo_show_option_bmmj'] = sanitize_text_field($input['logo_show_option_bmmj']);		
        $valid['logo_height_option_bmmj'] = sanitize_text_field($input['logo_height_option_bmmj']);  
        $valid['logo_width_option_bmmj'] = sanitize_text_field($input['logo_width_option_bmmj']);         
                    
                    
                    

        if (strlen($valid['menu_appareance_option_bmmj']) == "") 
        {
            add_settings_error(
            'menu_appareance_option_bmmj',
            'menu_appareance_option_bmmj_error',
            'Sorry, something is wrong. Appareance empty',
            'error'
            );
            # default value IF EMPTY			
            $valid['menu_appareance_option_bmmj'] = $this->data['menu_appareance_option_bmmj'];
        }
	

        $this->data['menu_name_option_bmmj'] = $valid['menu_name_option_bmmj'];  
        $this->data['menu_appareance_option_bmmj'] = $valid['menu_appareance_option_bmmj'] ; 
        $this->data['menu_register_option_bmmj'] = $valid['menu_register_option_bmmj'] ; 
        $this->data['menu_login_option_bmmj'] = $valid['menu_login_option_bmmj'] ; 
        $this->data['menu_search_option_bmmj'] = $valid['menu_search_option_bmmj'] ; 
        $this->data['menu_sitename_option_bmmj'] = $valid['menu_sitename_option_bmmj'] ; 
        $this->data['menu_header_visible_option_bmmj'] = $valid['menu_header_visible_option_bmmj'] ;  
        $this->data['logo_option_bmmj'] = $valid['logo_option_bmmj'] ; 
        $this->data['logo_show_option_bmmj'] = $valid['logo_show_option_bmmj'] ; 
        $this->data['logo_height_option_bmmj'] = $valid['logo_height_option_bmmj'] ;  
        $this->data['logo_width_option_bmmj'] = $valid['logo_width_option_bmmj'] ; 
                     
                    
                           

        //initialize all constants to options
        //$this->initializeConstants();
        
        return $valid;
    }//END validate($input) 
	

    
}//END Class_Install_LdvJarim
