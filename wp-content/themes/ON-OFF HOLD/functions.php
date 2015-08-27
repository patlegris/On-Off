<?php
/*
 * @author: Patrick LECOINTRE
 * @tags: @tests @scripts @filters @theme @widgets @taxonomy @custom
 */

/* ------------------------------------------------- *\
    @cms
\* ------------------------------------------------- */

require_once TEMPLATEPATH . '/inc/column/pl_column.php';

/* ------------------------------------------------- *\
    @theme  options dans le CMS
\* ------------------------------------------------- */

// Add setup function to the 'after_setup_theme' hook
add_action('after_setup_theme', 'pl_setup_theme');

// Add the 'top_menu' location in a theme setup function.
function pl_setup_theme()
{
    register_nav_menus([
        'top_menu' => 'Primary menu'
    ]);

    add_theme_support('post-thumbnails');
    add_image_size('thumbnail-column', 90, 90, true);

    add_theme_support('post-formats', ['aside', 'gallery', 'video']);
    $default = [
        'flex-width' => true,
        'width' => 980,
        'flex-height' => true,
        'height' => 200,
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
        body.login div#login h1 a {

            background-image: url(<?php echo get_template_directory_uri()?>/assets/images/fenley.png);
            padding-bottom: 30px;
        }

        body {
            background-color: #006505;
        }
    </style>

<?php }

/* ------------------------------------------------- *\
    Enqueue scripts and styles.
\* ------------------------------------------------- */

function pl_setup_style()
{
    wp_enqueue_style('normalize-css', get_template_directory_uri() . '/assets/css/vendor/normalize.css');

    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/', ['normalize-css']);

    wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css');

    wp_enqueue_style('bootstrap-theme-css', get_template_directory_uri() . '/assets/css/vendor/bootstrap-theme.min
    .css');
}
add_action('wp_enqueue_scripts', 'pl_setup_style');


function pl_setup_script()
{
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);


    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'));

    wp_enqueue_script('simpleSlider', get_template_directory_uri() . '/assets/js/vendor/jquery.simpleslider.package.min.js', array('jquery'));

    wp_enqueue_script('backstretch-js', get_template_directory_uri() . '/assets/js/vendor/jquery.backstretch.js', array('jquery'));

    wp_enqueue_script('plugins-js', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'));
}
add_action('wp_footer', 'pl_setup_script');



/**
 * Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
 */
function pl_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/vendor/html5shiv.min.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/vendor/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'pl_ie_support_header', 1 );


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
        'name' => 'Notre widget Sidebar',
        'id' => 'pl_widget_sidebar',
        'class' => 'pl_widget_class',
        'description' => 'widget sidebar gen',
        'before_widget' => '<div class="widget_%2$s clearfix">', // %2$s le nom du widget
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget_title" >',
        'after_title' => '</h1>'
    ]);

    register_sidebar([
        'name' => 'Notre widget footer',
        'id' => 'pl_widget_sidebar_footer',
        'class' => 'pl_widget_class',
        'description' => 'widget footer gen',
        'before_widget' => '<div class="widget_%2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget_title" >',
        'after_title' => '</h1>'
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
    @shortcode
\* ------------------------------------------------- */

add_shortcode('portfolio', 'pl_shortcode_portfolio');

function pl_shortcode_portfolio($atts, $content = null)
{
    $defaults = [
        'country' => 'Islande',
        'class' => 'portfolio',
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


/* --------------------------------------------------------- *\
   Register Custom Navigation Walker
\* --------------------------------------------------------- */

require_once('wp_bootstrap_navwalker.php');


/* --------------------------------------------------------- *\
   Add CSS and JS for use with bootstrap
\* --------------------------------------------------------- */
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Add the 'top_menu' location in a theme setup function.
function bootpress_setup() {
    register_nav_menus(
        array(
            'primary-menu' => 'Primary menu'
        )
    );
}

// Add setup function to the 'after_setup_theme' hook
add_action( 'after_setup_theme', 'bootpress_setup' );