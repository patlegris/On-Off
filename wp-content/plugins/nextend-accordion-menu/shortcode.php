<?php

function accordionmenu_shortcode($atts) {
    extract(shortcode_atts(array(
        'id' => md5(time()),
        'accordionmenu' => 0,
                    ), $atts));

    if ($accordionmenu == 0)
        return '';

    $instance = array('accordionmenu' => $accordionmenu);
    $args = array('widget_id' => $id, 'instance' => $instance);
    
    require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'accordionmenu'. DIRECTORY_SEPARATOR . 'wordpress' . DIRECTORY_SEPARATOR . 'menu.php' );

    $menu = new NextendMenuWordpress($args, $instance, dirname(__FILE__));
    ob_start();
    $menu->render();
    return ob_get_clean();
}

add_shortcode('accordionmenu', 'accordionmenu_shortcode');
?>
