<?php
/**
 * macroexpert functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package macroexpert
 */
if (!function_exists('macroexpert_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function macroexpert_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on macroexpert, use a find and replace
         * to change 'macroexpert' to the name of your theme in all the template files.
         */
        load_theme_textdomain('macroexpert', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'macroexpert'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('macroexpert_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'macroexpert_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function macroexpert_content_width() {
    $GLOBALS['content_width'] = apply_filters('macroexpert_content_width', 640);
}

add_action('after_setup_theme', 'macroexpert_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function macroexpert_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'macroexpert'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'macroexpert'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'macroexpert_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function macroexport_scripts() {
    wp_enqueue_style('macroexpert-style', get_stylesheet_uri());

    wp_enqueue_script('macroexpert-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('macroexpert-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    /*
     * Custom styles
     *        
     */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.1', 'all');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', false, '1.1', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '1.1', 'all');
    wp_enqueue_style('strock-icon', get_template_directory_uri() . '/css/strock-icon.css', false, '1.1', 'all');
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/vendors/owlcarousel/owl.carousel.css', false, '1.1', 'all');
    wp_enqueue_style('settings', get_template_directory_uri() . '/vendors/rs-plugin/css/settings.css', false, '1.1', 'all');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/vendors/magnific/magnific-popup.css', false, '1.1', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', false, '1.1', 'all');
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css',false,'1.1','all');

    /*
     * Custom scripts
     *        
     */
    wp_enqueue_script('jquery-2.2.0', get_template_directory_uri() . '/js/jquery-2.2.0.min.js', array(), '20151215', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true);
    wp_enqueue_script('jquery.themepunch.tools', get_template_directory_uri() . '/vendors/rs-plugin/js/jquery.themepunch.tools.min.js', array(), '20151215', true);
    wp_enqueue_script('jquery.themepunch.revolution', get_template_directory_uri() . '/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.actions', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.actions.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.carousel', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.carousel.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.kenburn', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.kenburn.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.layeranimation', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.migration', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.migration.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.navigation', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.navigation.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.parallax', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.parallax.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.slideanims', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.slideanims.min.js', array(), '20151215', true);
    wp_enqueue_script('revolution.extension.video', get_template_directory_uri() . '/vendors/rs-plugin/js/extensions/revolution.extension.video.min.js', array(), '20151215', true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/vendors/isotope/isotope.min.js', array(), '20151215', true);
    wp_enqueue_script('imagesloaded.pkgd', get_template_directory_uri() . '/vendors/imagesloaded/imagesloaded.pkgd.min.js', array(), '20151215', true);
    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/vendors/owlcarousel/owl.carousel.min.js', array(), '20151215', true);
    wp_enqueue_script('jquery.magnific-popup', get_template_directory_uri() . '/vendors/magnific/jquery.magnific-popup.min.js', array(), '20151215', true);
    wp_enqueue_script('theme', get_template_directory_uri() . '/js/theme.js', array(), '20151215', true);
    wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', array(), '20151215', true);
}

add_action('wp_enqueue_scripts', 'macroexport_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

function custom_paginate($max_num_pages) {
    global $wp_query, $wp_rewrite, $wp;
    $current_url = home_url(add_query_arg(array(), $wp->request));

    $tokens = explode('/', $current_url);

    $tokens[sizeof($tokens) - 1] != "repuestos" ? $current = $tokens[sizeof($tokens) - 1] : $current = 1;


    $current_url = $tokens[0] . "//" . $tokens[2] . "/" . $tokens[3];

    $pagination = array(
        'base' => $current_url . '/%#%',
        'format' => '',
        'total' => $max_num_pages,
        'current' => $current,
        'show_all' => TRUE,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => TRUE,
        'prev_text' => __('«'),
        'next_text' => __('»'),
        'type' => 'array',
        'add_args' => FALSE,
        'add_fragment' => ''
    );

    $links = paginate_links($pagination);

    if (!empty($links)) :
        ?>
        <ul class="pagination">
            <?php foreach ($links as $key => $page_link) : ?>
                <li class="<?php if (strpos($page_link, 'current') !== false) {
                echo ' active';
            } ?>">
                    <?php
                    echo str_replace("span", "a", $page_link);
                    ?>
                </li>
        <?php endforeach ?>
        </ul>
        <?php
    endif;
}

add_filter('query_vars', 'custom_query_vars_filter');

function custom_query_vars_filter($vars) {
    $vars[] = 'category';
    $vars[] .= 'product';
    return $vars;
}

add_filter('posts_where', 'wpse18703_posts_where', 10, 2);

function wpse18703_posts_where($where, &$wp_query) {
    global $wpdb;
    if ($wpse18703_title = $wp_query->get('wpse18703_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($wpdb->esc_like($wpse18703_title)) . '%\'';
    }
    return $where;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function my_acf_google_map_api($api) {
    $api['key'] = 'AIzaSyAMrZqCJwAWLqwZ_8zOVqXICF8hNbWq1BI';
    return $api;
}

function slugify($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

