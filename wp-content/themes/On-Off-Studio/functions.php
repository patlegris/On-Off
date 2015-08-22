<?php
/*
 * @author: Antoine
 * @tags: @tests @scripts @filters @theme @widgets @taxonomy @custom
 */

/* ------------------------------------------------- *\
    @cms
\* ------------------------------------------------- */

require_once TEMPLATEPATH . '/inc/column/pl_column.php';

/* ------------------------------------------------- *\
    @theme  options dans le CMS
\* ------------------------------------------------- */

add_action('after_setup_theme', 'pl_setup_theme');

function pl_setup_theme()
{
    register_nav_menus([
        'main'    => 'Mon menu principal',
        'footer'  => 'Mon menu footer',
        'sidebar' => 'Menu dans la sidebar'
    ]);

    add_theme_support('post-thumbnails');
    add_image_size('thumbnail-column', 90, 90, true);

    add_theme_support('post-formats', ['aside', 'gallery', 'video']);
    $default = [
        'flex-width'    => true,
        'width'         => 980,
        'flex-height'   => true,
        'height'        => 200,
        'default-image' => get_template_directory_uri() . '/images/headers/circle.png',
    ];
    add_theme_support('custom-header', $default);
}

/* ------------------------------------------------- *\
    @login
\* ------------------------------------------------- */


add_action('login_enqueue_scripts', 'pl_logo_login');

function pl_logo_login()
{
    // wp_enqueue_style ici avec un fichier css
    ?>

    <style>
        body.login div#login h1 a{

            background-image:url(<?php echo get_template_directory_uri()?>/assets/images/fenley.png);
            padding-bottom:30px;
        }
        body{
            background-color: #006505;
        }
    </style>

<?php }

/* ------------------------------------------------- *\
    @scripts
\* ------------------------------------------------- */

add_action('wp_enqueue_scripts', 'pl_setup_script');

function pl_setup_script()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.min.css');
    // si le css dépends de normalize on le précise dans l'argument 3 :
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', ['normalize']);

//    if (is_category(22))
//        wp_enqueue_style('bike', get_template_directory_uri() . '/assets/css/bike-elec.css');


    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js');

    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);
}

/* ------------------------------------------------- *\
    @filters
\* ------------------------------------------------- */

add_filter('excerpt_more', 'pl_read_more');

function pl_read_more($more)
{
    global $post; // le post dans la boucle objet

//    var_dump($post);  // objet dans la boucle de WP

    return '<p><a href="' . get_permalink($post->ID) . '" >lire la suite</a></p>';
}


/* ------------------------------------------------- *\
    @widgets
\* ------------------------------------------------- */

add_action('widgets_init', 'pl_setup_widgets');

function pl_setup_widgets()
{
    register_sidebar([
        'name'          => 'Notre widget Sidebar',
        'id'            => 'pl_widget_sidebar',
        'class'         => 'pl_widget_class',
        'description'   => 'widget sidebar gen',
        'before_widget' => '<div class="widget_%2$s clearfix">', // %2$s le nom du widget
        'after_widget'  => '</div>',
        'before_title'  => '<h1 class="widget_title" >',
        'after_title'   => '</h1>'
    ]);

    register_sidebar([
        'name'          => 'Notre widget footer',
        'id'            => 'pl_widget_sidebar_footer',
        'class'         => 'pl_widget_class',
        'description'   => 'widget footer gen',
        'before_widget' => '<div class="widget_%2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h1 class="widget_title" >',
        'after_title'   => '</h1>'
    ]);
}

/* ------------------------------------------------- *\
    @tax
\* ------------------------------------------------- */

require_once TEMPLATEPATH . '/inc/tax/pl_country.php';
require_once TEMPLATEPATH . '/inc/tax/pl_genre.php';


/* ------------------------------------------------- *\
    @custom
\* ------------------------------------------------- */

require_once TEMPLATEPATH . '/inc/custom/pl_portfolio.php';

/* ------------------------------------------------- *\
    @walker
\* ------------------------------------------------- */

require_once TEMPLATEPATH . '/inc/walker/pl_Walker_nav_menu.php';

/* ------------------------------------------------- *\
    @shortcode
\* ------------------------------------------------- */

add_shortcode('portfolio', 'pl_shortcode_portfolio');

function pl_shortcode_portfolio($atts, $content = null)
{
    $defaults = [
        'country' => 'Islande',
        'class'   => 'portfolio',
    ];
    $a = shortcode_atts($defaults, $atts);

    $query = new WP_Query([
        'post_type' => 'portfolio',
        // todo with term country taxonomy
    ]);

    if ($query->have_posts()) {
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post(); ?>
           <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <?php if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </a>
            <?php endif; ?>
       <?php }
        echo '</ul>';
    }
    wp_reset_postdata();

}

/* ------------------------------------------------- *\
    @meta box
\* ------------------------------------------------- */

require_once TEMPLATEPATH . '/inc/metabox/pl_portfolio.php';

/* ------------------------------------------------- *\
    @plugins  http://www.sitepoint.com/wordpress-options-panel/
\* ------------------------------------------------- */