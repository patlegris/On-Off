<?php


add_action('admin_enqueue_scripts', 'new_accordion_menu_disable_autosave');
function new_accordion_menu_disable_autosave() {
    if ('accordion_menu' == get_post_type()) {
        wp_dequeue_script('autosave');
        remove_action('edit_form_advanced', array($GLOBALS['wp_embed'], 'maybe_run_ajax_cache'));
        wp_deregister_script('postbox');
    }
}


add_filter('post_row_actions','new_accordion_menu_remove_quick_edit',10,2);
function new_accordion_menu_remove_quick_edit( $actions ) {
  	global $post;
    if( $post->post_type == 'accordion_menu' ) {
    		unset($actions['inline hide-if-no-js']);
    		unset($actions['view']);
  	}
    return $actions;
}


add_action('wp_ajax_nextend', 'nextend_init_ajax');
function nextend_init_ajax() {
    nextendimport('nextend.ajax.ajax');
    exit;
}


add_action('init', 'new_accordion_menu_post_type');
function new_accordion_menu_post_type() {
    $labels = array(
        'name' => _x('Accordion Menus', 'Accordion Menu general name'),
        'singular_name' => _x('Accordion Menu', 'Accordion Menu singular name'),
        'add_new' => _x('Add New', 'book'),
        'add_new_item' => __('Add New Accordion Menu'),
        'edit_item' => __('Edit Accordion Menu'),
        'new_item' => __('New Accordion Menu'),
        'all_items' => __('All Accordion Menus'),
        'view_item' => __('View Accordion Menu'),
        'search_items' => __('Search Accordion Menus'),
        'not_found' => __('No Accordion Menus found'),
        'not_found_in_trash' => __('No Accordion Menus found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Accordion Menus'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds Accordion Menu specific data',
        'public' => true,
        'supports' => array('title', 'product_price_box'),
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'menu_icon' => 'dashicons-list-view'
    );
    register_post_type('accordion_menu', $args);
}

add_filter('post_updated_messages', 'new_accordion_menu_messages');
function new_accordion_menu_messages($messages) {
    global $post, $post_ID;
    add_action( 'wp_before_admin_bar_render', 'nextend_remove_custompost_type_view_admin_bar' );
    $messages['accordion_menu'] = array(
        0 => '',
        1 => __('Accordion Menu configuration updated.'),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Accordion Menu configuration updated.'),
        5 => isset($_GET['revision']) ? sprintf(__('Accordion Menu configuration restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => __('Accordion Menu published.'),
        7 => __('Accordion Menu configuration saved.'),
        8 => __('Accordion Menu submitted.'),
        9 => sprintf(__('Accordion Menu scheduled for: <strong>%1$s</strong>.'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date))),
        10 => __('Accordion Menu configuration draft updated.'),
    );
    return $messages;
}

global $wp_version;
if (version_compare($wp_version, '3.8', 'l')) {
    add_action( 'admin_head', 'nextend_accordion_menu_icons' );
}

function nextend_accordion_menu_icons() {
?>
    <style type="text/css" media="screen">
    #menu-posts-accordion_menu .wp-menu-image {
        background: url(<?php echo plugin_dir_url(__FILE__) ?>images/accordionmenu-icon.png) no-repeat 1px -33px !important;
    }
    #menu-posts-accordion_menu:hover .wp-menu-image, 
    #menu-posts-accordion_menu.wp-has-current-submenu .wp-menu-image {
        background-position: 1px -1px !important;
    }
    #icon-edit.icon32-posts-accordion_menu {
        background: url(<?php echo plugin_dir_url(__FILE__) ?>images/accordionmenu-32x32.png) no-repeat;
    }
    </style>
    <?php
}


add_filter( 'manage_edit-accordion_menu_columns', 'new_accordion_menu_edit_columns' ) ;
function new_accordion_menu_edit_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Accordion Menu' ),
		'shortcode' => __( 'Shortcode' ),
		'date' => __( 'Date' )
	);

	return $columns;
}


add_action( 'manage_accordion_menu_posts_custom_column', 'new_accordion_menu_manage_columns', 10, 2 );
function new_accordion_menu_manage_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
				echo '[accordionmenu id="unique'.substr(md5($post_id),0,5).rand(1, 100).'" accordionmenu="'.$post_id.'"]';
			break;
		default :
			break;
	}
}


add_action('add_meta_boxes', 'init_nextend_configuration_box');
function init_nextend_configuration_box() {
    add_meta_box(
            'nextend_configuration', __('Configuration', 'Nextend_Accordion_Menu'), 'nextend_configuration_box', 'accordion_menu', 'normal', 'high', array('xml' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'configuration.xml')
    );
}


function nextend_configuration_box($object, $box) {
    $configurationXmlFile = $box['args']['xml'];
    if (NextendFilesystem::fileexists($configurationXmlFile)) {
        nextendimport('nextend.css.css');
        nextendimport('nextend.javascript.javascript');

        $css = NextendCss::getInstance();
        $js = NextendJavascript::getInstance();
        $css->addCssLibraryFile('wordpress/removeslug.css');
        $css->addCssLibraryFile('common.css');
        $css->addCssLibraryFile('window.css');
        $css->addCssLibraryFile('configurator.css');
        $js->loadLibrary('dojo');

        $js->addLibraryJsLibraryFile('dojo', 'dojo/window.js');
        $js->addLibraryJsAssetsFile('dojo', 'window.js');

        nextendimport('nextend.form.form');

        $control_name = 'nextend';

        $form = new NextendForm();
        $data = get_post_meta($object->ID, 'nextend_configuration', true);
        $form->loadArray($data);

        $form->loadXMLFile($configurationXmlFile);

        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'loadplugin.php');
        ?>
        <div id="nextend-configurator-wp" class="accordionmenu">
            <div class="gk_hack nextend-topbar"><div class="gk_hack nextend-topbar-logo"></div>
                <?php
                $manual = 'http://www.nextendweb.com/wiki/accordion-menu-documentation/';
                if ($manual != "") {
                    ?>
                    <a href="<?php echo $manual; ?>" target="_blank" class="gk_hack nextend-topbar-button nextend-topbar-manual">Manual</a>
                    <?php
                }


                $support = 'http://www.nextendweb.com/accordion-menu/#support';
                if ($support != "") {
                    ?>
                    <a href="<?php echo $support; ?>" target="_blank" class="gk_hack nextend-topbar-button nextend-topbar-support">Support</a>
                    <?php
                }
                ?>
                
                <?php
                  if(defined('NEXTENDACCORDIONMENULITE')){
                ?>
                    <a href="http://www.nextendweb.com/accordion-menu/" target="_blank" class="gk_hack nextend-topbar-button nextend-topbar-getpro">Get PRO</a>
                <?php
                  }
                ?>
                
                <div id="nextend-configurator-save" onclick="jQuery('#publish').trigger('click');" class="nextend-window-save"><div class="NextendWindowSave">SAVE</div></div>
		<div id="nextend-configurator-cancel" onclick="document.location.href='<?php echo admin_url('edit.php?post_type=accordion_menu'); ?>';"
		class="nextend-window-cancel"><div class="NextendWindowCancel">CANCEL</div></div>
            </div>
            <?php
            
            $form->set('manual', $manual);
            $form->set('support', $support);
            
            $form->render($control_name);

            $js->addLibraryJsAssetsFile('dojo', 'form.js');
            $js->addLibraryJs('dojo', '
                new NextendForm({
                  container: "nextend-configurator-wp",
                  data: ' . json_encode($form->_data) . ',
                  xml: "' . NextendFilesystem::toLinux(NextendFilesystem::pathToRelativePath($configurationXmlFile)) . '",
                  control_name: "' . $control_name . '",
                  url: "' . site_url('/wp-admin/admin-ajax.php?action=nextend') . '",
                  loadedJSS: ' . json_encode($js->generateArrayJs()) . ',
                  loadedCSS: ' . json_encode($css->generateArrayCSS()) . '
                });
            ', true);
            ?>
        </div>
        <?php
    }
}

add_action('save_post', 'nextend_save_post_accordion_menu_class_meta', 10, 2);
function nextend_save_post_accordion_menu_class_meta($post_id, $post) {

    $post_type = get_post_type_object($post->post_type);

    /* Check if the current user has permission to edit the post. */
    if ($post_type->name != 'accordion_menu' || !current_user_can($post_type->cap->edit_post, $post_id))
        return $post_id;

    /* Get the posted data and sanitize it for use as an HTML class. */
    $new_meta_value = ( isset($_POST['nextend']) ? $_POST['nextend'] : '' );

    /* Get the meta key. */
    $meta_key = 'nextend_configuration';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta($post_id, $meta_key, true);

    /* If a new meta value was added and there was no previous value, add it. */
    if ($new_meta_value && '' == $meta_value)
        add_post_meta($post_id, $meta_key, $new_meta_value, true);

    /* If the new meta value does not match the old value, update it. */
    elseif ($new_meta_value && $new_meta_value != $meta_value)
        update_post_meta($post_id, $meta_key, $new_meta_value);

    /* If there is no new meta value but an old value exists, delete it. */
    elseif ('' == $new_meta_value && $meta_value)
        delete_post_meta($post_id, $meta_key, $meta_value);
}

function nextend_remove_custompost_type_view_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('view');
}