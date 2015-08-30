<?php

/**
 *
 * This is an extended and modified version originally created by Edward McIntyre, full details below.
 *
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
namespace My_Bootstrap_Menu_Plugin_Namespace {

    class My_Bootstrap_Menu_Nav_Menu_Walker extends \Walker_Nav_Menu
    {

        private $settings;
	    private $unique_menu_id;

        function __construct(My_Plugin_Settings_Public $settings)
        {
            $this->settings = $settings;
	        $this->unique_menu_id = 'menu_' . $settings->get_option_settings_db_name();
        }

        /**
         * Amend the args array that is passed by ref to/from the Nav Menu functions
         * @param $args
         */
        public function amend_arg_values(&$args)
        {
            //Replace the UL for button groups etc.
            if ($this->is_button_menu()) {
                //Buttons and Button Group
                //<div class="nav [navbar-btn btn-group]  [navbar-left]  " role="group">
                $items_wrap = '<div id="%1$s" class="%2$s ' . $this->settings->menu_type . ' ' . $this->settings->menu_alignment . '" role="group">%3$s</div>';
            } else {
                //Navbar, Pills and Tabs
                //<ul class="nav [navbar-btn nav-pills] [navbar-left]">
                $items_wrap = '<ul id="%1$s" class="%2$s ' . $this->settings->menu_type . ' ' . $this->settings->menu_alignment . '">%3$s</ul>';
            }
	        $args->items_wrap = $items_wrap;

	        //Set the Container and Menu Classes
			$args->container = 'div';
            $args->container_class = "{$this->unique_menu_id}_container_class";
            $args->container_id = "{$this->unique_menu_id}_container";
            $args->menu_class = "{$this->settings->menu_type} {$this->settings->menu_alignment} {$this->settings->submenu_dropdown_direction}";
            $args->menu_id = "{$this->unique_menu_id}_outer_list";

	        //Set the fallback function if required
            if ($this->settings->override_fallback_menu)
                $args->fallback_cb = array($this, 'fallback');
        }

        /**
         *
         * Starts each Menu Header level
         *http://bootsnipp.com/snippets/featured/multi-level-dropdown-menu-bs3
         *
         * @see Walker::start_lvl()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of page. Used for padding.
         */
        public function start_lvl(&$output, $depth = 0, $args = array())
        {
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            $output .= "\n{$indent}<ul role='menu' class='dropdown-menu {$this->settings->submenu_dropdown_alignment}'>";
        }

        /**
         * Ends Each Submenu Level
         *
         * @param string $output
         * @param int $depth
         * @param array $args
         */
        public function end_lvl(&$output, $depth = 0, $args = array())
        {
            $indent = str_repeat("\t", $depth);
            $output .= "{$indent}</ul>\n";
        }


        /**
         * @see Walker::start_el()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         * @param object $args An array of additional arguments.
         * @param int $current_page ID of the current item.
         */
        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {

            $indent = ($depth) ? str_repeat("\t", $depth) : '';

            /**
             * Dividers, Headers or Disabled
             * =============================
             * Determine whether the item is a Divider, Header, Disabled or regular
             * menu item. To prevent errors we use the strcasecmp() function to so a
             * comparison that is not case sensitive. The strcasecmp() function returns
             * a 0 if the strings are equal.
             */

            //TODO: Fix this for button/pills/tabs
            if (isset($item->attr_title ) && strcasecmp($item->attr_title, 'divider') == 0 && $depth > 0) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } else if (isset($item->attr_title ) && strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth > 0) {
                $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr($item->title);
            } else if (isset($item->attr_title ) && strcasecmp($item->attr_title, 'disabled') == 0) {
                $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr($item->title) . '</a>';
            } else {


                //Build the classes
                //***********************************************
                if ($this->settings->include_wp_menu_classes) {
                    $outer_class_array = empty($item->classes) ? array() : (array)$item->classes;
                } else {
                    $outer_class_array = array();
                }

                $outer_class_array[] = 'menu-item-' . $item->ID;

                $outer_class = join(' ', apply_filters('nav_menu_css_class', array_filter($outer_class_array), $item, $args));

                //Set the main dropdown menu items to be 'dropdown' to open menu on  mouse over
                if ($args->has_children && $depth == 0 && true == $this->settings->submenu_headings_are_links)
                    $outer_class .= ' dropdown';

                //For submenus
                if ($args->has_children && $depth > 0)
                    $outer_class .= ' dropdown-submenu';

                if (in_array('current-menu-item', $outer_class_array))
                    $outer_class .= ' active';

                $outer_class = $outer_class ? esc_attr($outer_class) : '';


                //Set the menu item id
                //***********************************************
                $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
                $id = $id ? ' id="' . esc_attr($id) . '"' : '';


                //Main section for building the start of the menu item
                // "To use justified button groups with <button> elements, you must wrap each button in a button group."
                // So all buttons are wrapped in a btn-group
                //***********************************************
                $output .= $indent;
                if ($this->is_button_menu() && 0 === $depth) {
                    $output .= "<div {$id} class='btn-group {$this->settings->button_group_size} {$outer_class}' role='group'>";
                } else {
                    $output .= "<li {$id} class='{$outer_class}' >";
                }

                //Add attributes to the menu item
                //***********************************************
                $inner_atts_array = array();
                $inner_atts_array['title'] = !empty($item->attr_title) ? $item->attr_title : (!empty($item->title) ? $item->title : '');
                $inner_atts_array['target'] = !empty($item->target) ? $item->target : '';
                $inner_atts_array['rel'] = !empty($item->xfn) ? $item->xfn : '';


                // If item has_children add attributes to a.
                //***********************************************
                $inner_class = '';
                if ($this->is_button_menu() && 0 === $depth) {
                    //Add the button menu classes
                    $inner_class .= in_array('current-menu-item', $outer_class_array) ? ' active' : '';
                    $inner_class .= " btn {$this->settings->button_type}";
                }
                if ($args->has_children && 0 === $depth) {
                    $inner_atts_array['href'] = ! empty( $item->url ) ? $item->url : '#';
                    if(!(true == $this->settings->submenu_headings_are_links))
                        $inner_atts_array['data-toggle'] = 'dropdown';
                    $inner_class .= ' dropdown-toggle';
                   $inner_atts_array['aria-haspopup'] = 'true';
                } elseif($args->has_children) {
                    $inner_atts_array['href'] = (true == $this->settings->submenu_headings_are_links && !empty($item->url)) ? $item->url : '#';
                    /*Review here*/
                    $inner_atts_array['tabindex'] = "-1";
                } else {
                    $inner_atts_array['href'] = !empty($item->url) ? $item->url : '#';
                    /*Review here*/
                    $inner_atts_array['tabindex'] = "-1";
                }
                $inner_atts_array['class'] = $inner_class;

                $inner_atts_array = apply_filters('nav_menu_link_attributes', $inner_atts_array, $item, $args);


                //Create Attribute string
                //***********************************************
                $inner_atts = '';
                foreach ($inner_atts_array as $attr => $value) {
                    if (!empty($value)) {
                        $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                        $inner_atts .= ' ' . $attr . '="' . $value . '"';
                    }
                }

                $item_output = $args->before;

                /*
                 * Glyphicons
                 * ===========
                 * Since the the menu item is NOT a Divider or Header we check the see
                 * if there is a value in the attr_title property. If the attr_title
                 * property is NOT null we apply it as the class name for the glyphicon.
                 */
                if (!empty($item->attr_title) && strpos($item->attr_title, 'glyphicon-') !== false) {
                    $item_output .= '<a' . $inner_atts . '><span class="glyphicon ' . esc_attr($item->attr_title) . '"></span>&nbsp;';
                } else {
                    $item_output .= '<a' . $inner_atts . '>';
                }

                //Link before filter
                //***********************************************
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

                //Closing tags
                //***********************************************
                $item_output .= ($args->has_children && 0 === $depth) ? "{$this->display_caret()}</a>" : '</a>';
                $item_output .= $args->after;

                //Return value to next filter
                //***********************************************
                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            }
        }

        /**
         * Closes the li or div tag (for buttons) for each element
         * @param string $output
         * @param object $item
         * @param int $depth
         * @param array $args
         */
        public function end_el(&$output, $item, $depth = 0, $args = array())
        {
            if ($this->is_button_menu() && 0 === $depth) {
                $output .= "</div>\n";
            } else {
                $output .= "</li>\n";
            }
        }

        /**
         * Helper function to determine if we are using a button menu
         * @return bool
         */
        private function is_button_menu()
        {
            return ($this->settings->menu_type == My_Bootstrap_Menu_Nav_Menu_Consts::Menu_Type()['Buttons'] ||
                $this->settings->menu_type == My_Bootstrap_Menu_Nav_Menu_Consts::Menu_Type()['Button Group']);
        }

        /**
         * Determine whether or not to display the caret for the drop down menu (depth = 0)
         * @return string
         */
        private function display_caret()
        {
            $html = '';
            if ($this->settings->display_caret)
                $html .= "<span class='caret'></span>";

            return $html;
        }

        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth.
         *
         * This method shouldn't be called directly, use the walk() method instead.
         *
         * @see Walker::start_el()
         * @since 2.5.0
         *
         * @param object $element Data object
         * @param array $children_elements List of elements to continue traversing.
         * @param int $max_depth Max depth to traverse.
         * @param int $depth Depth of current element.
         * @param array $args
         * @param string $output Passed by reference. Used to append additional content.
         * @return null Null on failure with no changes to parameters.
         */
        public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
        {
            if (!$element)
                return;

            $id_field = $this->db_fields['id'];

            // Display this element.
            if (is_object($args[0]))
                $args[0]->has_children = !empty($children_elements[$element->$id_field]);

            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }

        /**
         * Menu Fallback
         * =============
         * If this function is assigned to the wp_nav_menu's fallback_cb variable
         * and a menu has not been assigned to the theme location in the WordPress
         * menu manager the function will display nothing to a non-logged in user,
         * and will add a link to the WordPress menu manager if logged in as an admin.
         *
         * @param array $args passed from the wp_nav_menu function.
         *
         */
        public static function fallback($args)
        {
            if (current_user_can('manage_options')) {

                extract($args);

                $fb_output = null;

                if ($container) {
                    $fb_output = '<' . $container;

                    if ($container_id)
                        $fb_output .= ' id="' . $container_id . '"';

                    if ($container_class)
                        $fb_output .= ' class="' . $container_class . '"';

                    $fb_output .= '>';
                }

                $fb_output .= '<ul';

                if ($menu_id)
                    $fb_output .= ' id="' . $menu_id . '"';

                if ($menu_class)
                    $fb_output .= ' class="' . $menu_class . '"';

                $fb_output .= '>';
                $fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">Add a menu</a></li>';
                $fb_output .= '</ul>';

                if ($container)
                    $fb_output .= '</' . $container . '>';

                echo $fb_output;
            }
        }
    }
}