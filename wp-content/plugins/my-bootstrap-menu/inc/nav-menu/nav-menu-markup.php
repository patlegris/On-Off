<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 29/05/2015
 * Time: 16:26
 *
 * http://getbootstrap.com/2.3.2/components.html#navbar
 */


/**
 * Class My_Bootstrap_Menu_Nav_Menu_Markup
 * 
 */
namespace My_Bootstrap_Menu_Plugin_Namespace {

    class My_Bootstrap_Menu_Nav_Menu_Markup
    {

        private $settings;
        private $home_url;
        private $site_title;
        private $current_url;
        private $login_url;
        private $logout_url;
        private $register_url;
        private $unique_menu_id;

        /**
         * Creates the Nav Menu Markup class
         * @param My_Plugin_Settings_Public $settings
         */
        function __construct(My_Plugin_Settings_Public $settings)
        {
            $this->settings = $settings;
            $this->site_title = get_bloginfo('name');
            $this->home_url = esc_url(home_url('/'));
            $this->current_url = esc_url(get_permalink());
            $this->login_url = wp_login_url($this->current_url);
            $this->logout_url = wp_logout_url($this->current_url);
            $this->register_url = wp_registration_url();
            $this->unique_menu_id = 'menu_' . $settings->get_option_settings_db_name();
        }

        /**
         * Main wrapper string for the nav menu object, to be used to surround the $nav output from the walker.
         *  Adds the menu icon button, search and login fields. Determines the type of menu, alignment and position.
         * @return string
         */
        public function get_navbar_prefix()
        {
            $html = '';
            $html .= $this->build_menu_prefix();
            return $html;
        }

        public function get_navbar_suffix()
        {
            $html = '';
            $html .= $this->build_menu_suffix();

            return $html;
        }


        /**
         * Moves the menu down if fixed top and admin bar is showing
         * @return string
         */
        private function fixed_top_spacer_div()
        {
            // Fix menu overlap bug..
            $html = '';
            if ($this->settings->navbar_fixed_type == 'navbar-fixed-top') {
                $html .= "<div style='min-height: 28px !important;'></div>";
            }
            return $html;
        }


        /**
         * Creates the prefix for the Nav Menu
         * @return string
         */
        private function build_menu_prefix()
        {
            $html = '';

            //Wrap the whole menu in a container to limit to content width
            if ($this->settings->wrap_in_container)
                $html .= "<div class='container'>";

            //Main Nav Menu settings here - format and fixed type location
            $html .= "<nav class='navbar {$this->settings->navbar_format} {$this->settings->navbar_fixed_type}'
                        role='navigation'>";

            //Move the menu top down if the WP admin bar is displayed
            $html .= is_admin_bar_showing() ? $this->fixed_top_spacer_div() : '';

            //Inner Nav div and Container or Container-Fluid
            $html .= "    <div class='navbar-inner'>
                            <div class='{$this->settings->class_container}'>";

            //Header section for the collapsed button and brand/logo.
            $html .= "<div class='navbar-header'>";

            //3 icon bar button for the collapsed menu only.
            if ($this->settings->display_icon_bar_button)
                $html .= "<button type='button'
                            class='navbar-toggle'
                            data-toggle='collapse'
                            data-target='#{$this->unique_menu_id}'
                            aria-expanded='false'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>";

            //Get logo and title visible only for collapsed menu.
            $html .= $this->get_display_logo('visible-xs');
            $html .= $this->get_display_title('visible-xs');

            //close navbar header section
            $html .= "</div> <!-- close navbar-header-->";

            //Collapse menu target and target id
            $html .= "<div class='collapse navbar-collapse'
                       id='{$this->unique_menu_id}'>";

            //Get logo and title visible only for full menu, includes alignment left/right
            // this is deliberately separated from the navbrand above as gives flexibility for edge case of separate left/right align logo/title
            $html .= $this->get_display_logo('hidden-xs ' . $this->settings->logo_alignment);
            $html .= $this->get_display_title('hidden-xs ' . $this->settings->title_alignment);

            //Nav Menu Walker continues here...

            return $html;
        }

        /**
         * Creates the suffix for the Nav Menu
         * @return string
         */
        private function build_menu_suffix()
        {
            $html = '';

            //Add the search field if set
            $html .= $this->get_search_field();

            //Add the login/logout url
            $html .= $this->get_login();

            //Add register icon, only if user is not logged in
            $html .= $this->get_register();


            //Close standard divs
            $html .= "            </div><!-- navbar-collapse -->
                        </div> <!-- class container -->
                    </div> <!-- navbar inner -->
                </nav> <!-- nav class --> ";

            //Close wrapper class if required
            if ($this->settings->wrap_in_container)
                $html .= "</div><!-- wrapper container class --> ";

            $html .= ($this->settings->include_div_for_fixed_top) ? $this->fixed_top_spacer_div() : '';

            return $html;
        }

        /**
         * Class used to tweak the css to fix having both the title and logo in the header menu
         * @return string
         */
        private function get_navbar_title_and_logo_class()
        {
            $html = '';
            if ($this->settings->display_title && $this->settings->display_logo)
                $html .= 'navbar-title-logo';

            return $html;
        }

        /**
         * Display the logo if required
         * @param $additional_class
         * @return string
         */
        private function get_display_logo($additional_class)
        {
            $html = '';

            if ($this->settings->display_logo && ($this->settings->logo_url != '' || $this->settings->logo_small_url != '')) {

                if ($additional_class == 'visible-xs') {
                    $logo_url = ($this->settings->logo_small_url != '') ? $this->settings->logo_small_url : $this->settings->logo_url;
                } else {
                    $logo_url = $this->settings->logo_url;
                }

                $height = ($this->settings->logo_height != '') ? "height='{$this->settings->logo_height}'" : "";
                $width = ($this->settings->logo_width != '') ? "width='{$this->settings->logo_width}'" : "";

                $html .= "<a class='navbar-brand {$additional_class} {$this->get_navbar_title_and_logo_class()}' href='{$this->home_url}'>
                            <img src='{$logo_url}'
                               title='{$this->home_url}'
                               {$height}
                               {$width}>
                       </a>";
            }
            return $html;
        }

        /*
         * Display the title if selected
         */
        private function get_display_title($additional_class)
        {
            $html = '';
            if ($this->settings->display_title)
                $html .= "<a class='navbar-brand $additional_class {$this->get_navbar_title_and_logo_class()}'
                         href='{$this->home_url}'
                         {$this->get_title_style()}>{$this->site_title}</a>";
            return $html;
        }

        private function get_title_style()
        {
            $html = '';
            if ($this->settings->title_text_transform != '')
                $html .= "style='text-transform:{$this->settings->title_text_transform};'";
            return $html;
        }

        /**
         * Builds a search box with either a glyphicon to search of a full button.
         * uses the default text to temporarily fill the search box
         * @return string
         */
        private function get_search_field()
        {
            $html = '';
            if ($this->settings->display_search) {
                $html .= "<ul class='nav navbar-nav {$this->settings->search_alignment}'>
                        <li>
                            <form method='get'
                                  id='searchform'
                                  action='{$this->home_url}'
                                  class='navbar-form'
                                  role='search'>
                                <div class='form-group'>
                                    <input class='form-control'
                                           type='text'
                                           size={$this->settings->search_box_width}
                                           name='s'
                                           id='s'
                                           value='{$this->settings->search_default_value}'
                                           onfocus=\"if(this.value==this.defaultValue)this.value='';\"
                                           onblur=\"if(this.value=='')this.value=this.defaultValue;\"/>
                                    <input type='submit'
                                           id='{$this->unique_menu_id}_search'
                                           value='search'
                                           class='btn form-control hidden' />";
                //Add search button if either glyhpicon is selected or label is not blank
                if ($this->settings->search_glyphicon != '' || $this->settings->search_label != '') {
                    $html .= "        <label for='{$this->unique_menu_id}_search'
                                        class='btn {$this->settings->search_button_type}'>
                                        <i class='{$this->settings->search_glyphicon}'></i>{$this->settings->search_label}</label>";
                }

                $html .= "            </div>
                            </form>
                        </li>
                    </ul>";
            }
            return $html;
        }

        /**
         * Get the login if required, uses a glyphicon if selected
         * @return string
         */
        private function get_login()
        {
            $html = '';
            if ($this->settings->display_login) {

                $html .= "<ul class='nav navbar-nav {$this->settings->login_alignment}'>
                            <li>";

                if (is_user_logged_in()) {
                    $login_logout_url = $this->logout_url;
                    $login_logout_label = $this->settings->logout_label;
                    $login_logout_glyhicon = $this->settings->logout_glyphicon;
                } else {
                    $login_logout_url = $this->login_url;
                    $login_logout_label = $this->settings->login_label;
                    $login_logout_glyhicon = $this->settings->login_glyphicon;
                }
                $login_logout_url = esc_url($login_logout_url);

                $html .= "<a href='{$login_logout_url}'><span class='{$login_logout_glyhicon}'></span>{$login_logout_label}</a>";
                $html .= "</li>
                    </ul>";
            }
            return $html;
        }

        /**
         * Gets the register button if required, uses a glyphicon if selected
         * @return string
         */
        private function get_register()
        {
            $html = '';
            if ($this->settings->display_register && !is_user_logged_in()) {
                $html .= "<ul class='nav navbar-nav {$this->settings->register_alignment}'>
                            <li>
                                <a href='{$this->register_url}'><span class='{$this->settings->register_glyphicon}'></span>{$this->settings->register_label}</a>
                            </li>
                        </ul>";
            }
            return $html;
        }

    }
}