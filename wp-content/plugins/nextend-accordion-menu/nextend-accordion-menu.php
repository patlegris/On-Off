<?php
/*
Plugin Name: Nextend Accordion Menu
Plugin URI: http://nextendweb.com/
Description: User-friendly, highly customizable and easy to integrate menu solution to build custom accordion menus from any WordPress menu.
Version: 9.3.1
Author: Nextend
Author URI: http://www.nextendweb.com
License: GPL2
 */

/*  Copyright 2012  Roland Soos - Nextend  (email : roland@nextendweb.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
defined('NEXTENDACCORDIONMENULITE') || define('NEXTENDACCORDIONMENULITE', true);
 
define('NEXTEND_ACCORDION_MENU', dirname(__FILE__) . DIRECTORY_SEPARATOR );
define('NEXTEND_ACCORDION_MENU_ASSETS', NEXTEND_ACCORDION_MENU . 'library' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR );

add_action( 'plugins_loaded', 'nextend_accordion_menu_load');
function nextend_accordion_menu_load(){

    if (!defined('NEXTENDLIBRARY')) {
        require_once(dirname(__FILE__).'/nextend/wp-library.php');
    }
    
    if(is_admin()){
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'admin.php');
    }
    
    require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'shortcode.php');
    
    require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'widget.php');
}

add_action('admin_menu', 'nextend_accordion_menu_upgradepro');

function nextend_accordion_menu_upgradepro() {
	add_submenu_page('edit.php?post_type=accordion_menu', 'Nextend Accordion Menu Upgrade to PRO', 'Upgrade to PRO', 'manage_options', __FILE__, 'nextend_accordion_menu_upgradepro_page');
}

function nextend_accordion_menu_upgradepro_page() {
?>
<style type="text/css">
.new-product-box.new-accordion-menu{
  background-image: url(<?php echo plugins_url( 'images/pro/bg.png' , __FILE__ ); ?>);
  background-repeat: repeat-x;
  background-size: auto 100%;
  border: 1px solid #464371;
  border-radius: 5px 5px 5px 5px;
  margin: 20px 0 0 0;
  position: relative;
  width: 100%;
}

.new-product-box.new-accordion-menu img{
  max-width: 100%;
}

.new-product-box .new-column-right {
    float: right;
    margin-bottom: 10px;
    text-align: right;
    width: 53%;
}

.new-product-box .new-column-left {
    float: left;
    margin-top: 4%;
    padding-left: 4%;
    width: 43%;
}

.new-product-box .new-column-left h3 {
    line-height: 0;
    margin-left: -3px;
    margin-top: 0;
}

.new-product-box .new-column-left p {
    color: #FFFFFF;
    font-size: 14px;
    line-height: 24px;
    text-align: justify;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    padding-right: 10px;
}

.new-product-box .new-column-left p.center-img {
    margin: 50px 0 0 0;
    text-align: center;
}

.new-product-box .new-light {
    height: 17px;
    margin: 0 -5.5%;
}

.new-product-box .new-column-left .new-buttons-container {
    margin-top: 0;
    text-align: center;
}

.new-product-box .new-column-left .new-buttons-container a:first-child {
    margin: 0 62px 0 0;
}

a.new-buynow {
    background: url(<?php echo plugins_url( 'images/pro/buynow.png' , __FILE__ ); ?>) no-repeat 0 0;
}

a.new-details {
    background: url(<?php echo plugins_url( 'images/pro/details.png' , __FILE__ ); ?>) no-repeat 0 0;
}

a.new-button {
    display: inline-block;
    height: 53px;
    overflow: hidden;
    text-indent: -10000px;
    width: 168px;
}

a.new-buynow:hover {
    background-position: 0 -100px;
}

a.new-details:hover {
    background-position: 0 -100px;
}
</style>
<div style="max-width: 1120px;">
  <h2>Upgrade to PRO version</h2>

  <p><b>Why should I upgrade to Accordion Menu PRO?</b></p>
  <p>We have three good reason why:</p>
  <ul>
  <li><b>1. New Themes:</b> The PRO version contains three new themes with 50 predefinied skins, also a ton of new options for the themes.</li>
  <li><b>2. Personal Support:</b> We are committed to top-notch customer support because we know if you have problem with a menu you need a solution as soon as possible.</li>
  <li><b>3. Extra features:</b> Extra features for the extra themes! Please let us know if you would like to see additional features added to the Accordion Menu for future versions!</li>
  </ul>
  <h3>Don't hesitate, <a href="http://www.nextendweb.com/accordion-menu/" target="_blank">UPGRADE!</a></h3>

  <div class="new-product-box new-accordion-menu">
    <div class="new-cap"></div>
    <div class="new-column-right">
      <img src="<?php echo plugins_url( 'images/pro/accordionmenu.png' , __FILE__ ); ?>" />
    </div>
    <div class="new-column-left">
      <h3><img alt="Accordion Menu" src="<?php echo plugins_url( 'images/pro/accordionmenupro.png' , __FILE__ ); ?>" /></h3>
      <p>The Accordion Menu PRO by Nextend is a user-friendly, highly customizable and easy to integrate solution to build your custom menus the way you want them. It gives you complete control over menu levels, colors, animation effects and more. Accordion menus are used widely in navigation, sliding, minimizing and maximizing content. </p>
      <p class="center-img">
        <img src="<?php echo plugins_url( 'images/pro/infos.png' , __FILE__ ); ?>" />
      </p>
      <div class="new-light">
        <img src="<?php echo plugins_url( 'images/pro/light.png' , __FILE__ ); ?>" />
      </div>
      <p class="new-buttons-container">
        <a class="new-buynow new-button" href="http://www.nextendweb.com/accordion-menu#pricing" target="_blank">Buy now</a>
        <a class="new-details new-button" href="http://www.nextendweb.com/accordion-menu/" target="_blank">Details</a>
      </p>
    </div>
    <div class="clear"></div>
  </div>

</div>
<?php 
} 