=== bootstrap main menu responsive ===
Contributors: jarim
Donate link: http://www.sos-childrensvillages.org/
Tags: bootstrap,menu bootstrap,menu responsive,main menu,bootstrap main menu,menu collapse,collapse,menu
Requires at least: ?
Tested up to: 4.1
Stable tag: 1.3
License: GPLv2
bootstrap-main-menu-responsive: is your perfect menu for both computers and mobiles. Many options in admin panel.


== Description ==

bootstrap-main-menu-responsive: is your perfect bootstrap menu for both computers and mobiles. You can Choose between fixed at top, fixed at bottom, normal, inverse, etc.

<a href="http://www.jarimos.dk/websjarim/bootstrap-main-menu-responsive" >For live example click here!!!</a><br><br>
<a href="http://www.sos-childrensvillages.org/" >Donate and help children her!!!</a><br><br>


Current features include:

* Menu responsive to mobile and computer.
* Bootstrap technology.
* Allow submenus (only 1 level)
* In admin panel you can set visible or invisible your actual logo, header, search-bar, register and login :)
* Menu options: fixed at top, fixed at bottom, normal, dark menu, etc.
* Easy uninstall not harming your wordpress installation in anyway.

... and all that integrated in the stylish WordPress look.


= Languages =

* ALL


== Installation ==

= Installation =

* Install the plugin through the Admin page "Plugins".
* Alternatively, unpack and upload the contents of the zipfile to your '/wp-content/plugins/' directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* You need at least one menu in your website, so if you do not have one, just create it in Admin-> Appearance ->Menus. 
* If bootstrap doesn't get your menu automatically, just write your menu name in Admin-> Settings -> Bootstrap_M_menu.
* If your bootstrap menu STILL doesn't appear,  just add the existing menu to Theme locations -> Navigation Menu in  Admin -> Appearance -> Menus, at the bottom of the menu.
* Choose the options you like in Admin-> Settings -> Bootstrap_M_menu.


= Updating from an old version =


= Licence =

The plugin itself is released under the GNU General Public License; 


= API, add an entry =


== Frequently Asked Questions ==

= Where is the plugin in the admin menu? =

Admin-> Settings -> Bootstrap_M_menu

= I changed the menu type to fixed-top and I can't se the menu properly =

If you are in logged in, just log out. The admin panel can overlay your bootstrap menu :)

= Not working at all? =

1. Be sure you have created a menu and added it to: <br> Theme locations -> Navigation Menu inside Appareance -> Menus <br>
2. You can also just create a menu in:<br> Admin-> Appareance -> Menus,<br> give the manu a name and insert the name in: <br>
Admin-> Settings -> Bootstrap_M_menu. 

= My header and menus are visible all the time  =

Go to <br>
Admin-> Settings -> Bootstrap_M_menu<br> 
and check that Show Header is NOT checked<br>
If is NOT checked and you still see the header, you have to remove the elements self in YOUR-THEME-FOLDER/header.php file,
because this plugin removes your header only if the id="masthead", using jquery.

= I want my header visible but not my default menu =

Find the word "wp_nav_menu" inside YOUR-THEME-FOLDER/header.php file and delete-comment the text as neccessary. I recommend you to make a copy of your header.php before you start your experiments :)

== Screenshots ==

1. Frontend view of the menu
2. Frontend view of the menu collapssed
3. Frontend view of the menu collapssed-opened
4. Settings panel, showing the options.


== Changelog ==

= 1.3 =
* 2015-04-09
* Release stable and updated version 1.3 to the public.
* Go on holiday, have a few beers, and watch the girls do the hoolahoop().

= 1.0 =
* 2015-04-01
* Release stable and updated version 1.0 to the public.
* Go on holiday, have a few beers, and watch the girls do the hoolahoop().

== Upgrade Notice ==

= 1.3 =
This version us better.  Recommended Upgrade :).

= 1.2 =
This version us better.  Recommended Upgrade :).

= 1.1 =
This version us better.  Recommended Upgrade :).