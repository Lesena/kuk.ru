<?php
/****************************************************************
 * DO NOT DELETE
 ****************************************************************/
if ( get_stylesheet_directory() == get_template_directory() ) {
	define('ALETHEME_PATH', get_template_directory() . '/aletheme');
	define('ALETHEME_URL', get_template_directory_uri() . '/aletheme');
}  else {
    define('ALETHEME_PATH', get_theme_root() . '/fuerza/aletheme');
    define('ALETHEME_URL', get_theme_root_uri() . '/fuerza/aletheme');
}

require_once ALETHEME_PATH . '/init.php';
// FontAwesome Version
define('ESPRESSO_FA_VERSION','4.5.0');

// Initial Load
require('_framework/init.php');

// Add theme support for post thumbnails & post formats
require('_theme_settings/add-theme-support.php');
// Register Sidebars
require('_theme_settings/register-sidebars.php');

// Theme related functions
require('_theme_settings/theme-functions.php');

// Theme colors
require('_theme_settings/theme-colors.php');


// Shortcodes
require('_theme_settings/theme-shortcodes.php');


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


load_theme_textdomain( 'aletheme', get_template_directory() . '/lang' );
$locale = get_locale();
$locale_file = get_template_directory() . "/lang/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);


// Envira Gallery License
add_action( 'after_setup_theme', 'tgm_envira_define_license_key' );
function tgm_envira_define_license_key() {

    // If the key has not already been defined, define it now.
    if ( ! defined( 'ENVIRA_LICENSE_KEY' ) ) {
        define( 'ENVIRA_LICENSE_KEY', '93b032dcb25f3564ff1814b3fd777efb' );
    }

}

// Slider Revolution Theme Mode
add_action( 'init', 'boxy_revsliderSetAsTheme' );
function boxy_revsliderSetAsTheme() {
    if (function_exists('set_revslider_as_theme')){ set_revslider_as_theme(); }
}

// Visual Composer Theme Mode
add_action( 'init', 'boxy_vcSetAsTheme' );
function boxy_vcSetAsTheme() {
    if (function_exists('vc_set_as_theme')) : vc_set_as_theme(true); endif;
}

// Live Composer Compatibility
if ( ! function_exists( 'ot_get_media_post_ID' ) ) {
    function ot_get_media_post_ID() {
        global $wpdb;
        return $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE `post_name` = 'media' AND `post_type` = 'option-tree' AND `post_status` = 'private'" );
    }
}

// WooCommerce
require('_theme_settings/woocommerce.php');


/**
 * Activates Theme Mode
 */
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Loads OptionTree
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
load_template( trailingslashit( get_template_directory() ) . '_theme_settings/theme-options.php' );








if(function_exists('register_nav_menus')){
    register_nav_menus(
        array( // создаём любое количество областей
            'main_menu' => 'Главное меню', // 'имя' => 'описание'
            'foot_menu' => 'Меню в футере'
        )
    );
}

function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
            ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div id="comment_block">
                    <div class="comment-author vcard">
                        <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
                        <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
                        <div class="comment-meta commentmetadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('Изменить '),'&nbsp;&nbsp;','');  delete_comment_link(get_comment_ID());?>
                            <div class="coll_comm">Комментариев: <?php commentCount(); ?></div>
                        </div>
                    </div>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <div class="comment-awaiting-verification"><?php _e('Ваш комментарий ожидает проверки модератором .') ?></div>
                        <br>
                    <?php endif; ?><div class="comment_text">
                        <?php comment_text() ?>
                    </div>
                    <div class="reply">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <?php
            break;
        case 'pingback'  :
        case 'trackback' :
            ?>
            <li class="post pingback">
            <?php comment_author_link(); ?>
            <?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
            <?php
            break;
    endswitch;
}
// Область виджетов в шапке
register_sidebar(array(
    'name' => __('Виджеты для шапки'),
    'id' => 'header-widget-area',
    'description' => __('Виджеты в шапке, например для баннера'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3><a href="#">',
    'after_title' => '</a></h3>',
));

// Область виджетов внутри поста
register_sidebar(array(
    'name' => __('Виджеты на странице поста'),
    'id' => 'postin-widget-area',
    'description' => __('Виджеты на странице поста'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3><a href="#">',
    'after_title' => '</a></h3>',
));

// Область виджетов на странице архивов
register_sidebar(array(
    'name' => __('Виджеты для страницы архивов'),
    'id' => 'arhive-widget-area',
    'description' => __('Виджеты для страницы архивов'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3><a href="#">',
    'after_title' => '</a></h3>',
));
/****************************************************************
 * You can add your functions here.
 * 
 * BE CAREFULL! Functions will dissapear after update.
 * If you want to add custom functions you should do manual
 * updates only.
 ****************************************************************/

/**
 * Custom walker to put correct classes on <li>'s for main nav header top nav
 */
/*
		Theme Title found on page 77
		*/
function j2theme_filter_wp_title( $currenttitle, $sep, $seplocal ) {
    //Grab the site name
    $site_name = get_bloginfo( 'name' );
    // Add the site name after the current page title
    $full_title = $site_name . $currenttitle;
    // If we are on the front_page or homepage append the description
    if ( is_front_page() || is_home() ) {
        //Grab the Site Description
        $site_desc = get_bloginfo( 'description' );
        //Append Site Description to title
        $full_title .= ' ' . $sep . ' ' . $site_desc;
    }
    return $full_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'j2theme_filter_wp_title', 10, 3 );









/**
 * Menu location registration page 90
 */
register_nav_menus(
    array(
        'main-nav-header-top' => 'Main Nav, Top of Header',
        'mobile-main-nav-header-top' => 'MOBILE Main Nav, Top of Header',
        'sub-nav-header-bottom' => 'Sub Nav, Bottom of Header',
        'mobile-sub-nav-header-bottom' => 'MOBILE Sub Nav, Bottom of Header',
        'aside-nav' => 'Widget Sidebar Menu',
        'footer-nav' => 'Footer Menu',
        'mobile-footer-nav' => 'MOBILE Footer Menu'
    )
);









/**
 * Custom walker to put correct classes on <li>'s for main nav header top nav
 */
class main_nav_header_top_walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' alignleft nobull text-shad txttranup"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';




    }

}


/**
 * Custom walker to put correct classes on <li>'s for sub nav header bottom nav
 */
class sub_nav_header_bottom_walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' alignleft nobull osc-cond text-shad-lt"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}


/**
 * Custom walker to put correct classes on <li>'s for footer nav
 */
class footer_nav_walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' alignleft nobull text-shad txttranup"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}

function devise_autolink_featured_images( $html, $post_id, $post_image_id ) {
    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
    return $html;
}
add_filter( 'post_thumbnail_html', 'devise_autolink_featured_images', 10, 3 );

if ( ! function_exists( 'kuk_setup' ) ) :
    function kuk_setup() {
        // Сделаем тему доступной для перевода
        // Файлы перевода должны находиться в каталоге /languages/
        load_theme_textdomain( 'kuk', get_template_directory() . '/languages' );

        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if ( is_readable( $locale_file ) )
            require_once( $locale_file );

        add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link'
) );

        add_theme_support('post-thumbnails');

        if ( function_exists('add_image_size') ) {
            add_image_size('tiny', 128, 79);
            add_image_size('small', 256, 158);
            add_image_size('medium', 384, 237);
            add_image_size('large', 512, 316);
        };

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    }
endif; // dyad_setup
add_action( 'after_setup_theme', 'kuk_setup' );



            //хлебные крошки
            //Breadcrumb для сайта
            function the_breadcrumb() {
                if ( !is_home() ) {
                    echo '<div id="breadcrumb"> <ul class="crumbs"><li class="first"><a href="';
                    echo get_option('home');
                    echo '" style="z-index:9;"><span></span>';
                    echo 'Главная ';
                    echo "</a></li>";
                }

                if ( is_category() || is_single() ) {
                    $cats = get_the_category();
                    $cat = $cats[0];
                    $output .= '<a href="'.get_category_link($cat->term_id).'" style="z-index:8;">
'.$cat->name.'</a>';
                    echo '<li>'.$output.'</li>';
                }

                if(is_single())
                {
                    echo '<li><a href="'.get_permalink().'" style="z-index:7;">';trim_title_words(7, '...');echo '</a></li>';
                }
                if(is_page())
                {
                    echo '<li><a href="'.get_permalink().'" style="z-index:8;">';trim_title_words(7, '...');echo '</a></li>';
                }
                echo "</ul></div><div class=\"clear\"></div>";
            }

            function trim_title_words($count, $after) {
                $title = get_the_title();
                $words = split(' ', $title);
                if (count($words) > $count) {
                    array_splice($words, $count);
                    $title = implode(' ', $words);
                }
                else $after = '';
                echo $title . $after;
            }
add_action( 'init', 'true_register_products' ); // Использовать функцию только внутри хука init

function true_register_products() {
    $labels = array(
        'name' => 'Товары',
        'singular_name' => 'Товар', // админ панель Добавить->Функцию
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новый товар', // заголовок тега <title>
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'all_items' => 'Все товары',
        'view_item' => 'Просмотр товаров на сайте',
        'search_items' => 'Искать товары',
        'not_found' =>  'Товаров не найдено.',
        'not_found_in_trash' => 'В корзине нет товаров.',
        'menu_name' => 'Товары' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true, // благодаря этому некоторые параметры можно пропустить
        'menu_icon' => 'dashicons-cart', // иконка корзины
        'menu_position' => 5,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
        'taxonomies' => array('post_tag','category'),
        'exclude_from_search' => true,
  'capability_type' => 'product',
  'rewrite' => array( 'slug' => 'hot-new-trends',)
    );
    register_post_type('product',$args);
}

// переменная $post в данном случае - объект поста
$termini = get_the_terms( $post, array('category','post_tag','ваша_произвольная_таксономия') );

// проверяем, что $termini не равно false, и не является объектом WP_Error
if ( $termini && ! is_wp_error( $termini ) ) {

    // все полученные элементы по ходу цикла мы будем класть в этот массив
    $termini_massiv = array();

    foreach ( $termini as $termin ) {
        // добавление элемента в массив
        $termini_massiv[] = '<a href="' . get_term_link( $termin ) . '" title="Перейти к ' . esc_attr( $termin->name ) .  '">' . $termin->name . '</a>';
    }

    // на данном этапе у нас имеется массив $termini_massiv, содержащий ссылки на все нужные термины
    // используя функцию PHP join(), объединим элементы массива в строку, в качестве разделителя используем запятую с пробелом
    $termini_a_hrefs = join( ", ", $termini_massiv );

    // осталось только вывести блок ссылок
    echo '<div>Теги: <span>' . $termini_a_hrefs . '</span></div>';
}

/* REQUIRED PLUGINS */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'espresso_register_required_plugins' );

function espresso_register_required_plugins() {

    $plugins = array(

        array(
            'name'                  => 'Restaurant Add-Ons (required)',
            'slug'                  => 'espresso-addons',
            'source'                => 'http://boxycdn-plugins.s3.amazonaws.com/espresso-addons.zip',
            'required'              => true
        ),

        array(
            'name'                  => 'Restaurant Reservations',
            'slug'                  => 'restaurant-reservations',
            'required'              => false
        ),

        array(
            'name'                  => 'The Events Calendar',
            'slug'                  => 'the-events-calendar',
            'required'              => false
        ),

        array(
            'name'                  => 'Contact Form 7',
            'slug'                  => 'contact-form-7',
            'required'              => false
        ),

        array(
            'name'                  => 'Envira Gallery',
            'slug'                  => 'envira-gallery',
            'source'                => 'http://boxycdn-plugins.s3.amazonaws.com/envira-gallery.zip',
            'required'              => false
        ),

        array(
            'name'                  => 'Soliloquy Slider',
            'slug'                  => 'soliloquy',
            'source'                => 'http://boxycdn-plugins.s3.amazonaws.com/soliloquy.zip',
            'required'              => false
        ),

        array(
            'name'                  => 'Slider Revolution',
            'slug'                  => 'revslider',
            'source'                => 'http://boxycdn-plugins.s3.amazonaws.com/revslider.zip',
            'required'              => false
        ),

        array(
            'name'                  => 'WPBakery Visual Composer',
            'slug'                  => 'js_composer',
            'source'                => 'http://boxycdn-plugins.s3.amazonaws.com/js_composer.zip',
            'required'              => false
        ),

    );

    $config = array(
        'domain'            => 'espresso',           			// Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           	// Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',        	 		// Default parent menu slug
        'parent_url_slug'   => 'themes.php',         			// Default parent URL slug
        'menu'              => 'install-required-plugins',   	// Menu slug
        'has_notices'       => true,                         	// Show admin notices or not
        'is_automatic'      => false,            				// Automatically activate plugins after installation or not
        'message'           => '',               				// Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', 'espresso' ),
            'menu_title'                                => __( 'Install Plugins', 'espresso' ),
            'installing'                                => __( 'Installing Plugin: %s', 'espresso' ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', 'espresso' ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', 'espresso' ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', 'espresso' ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', 'espresso' ) // %1$s = dashboard link
        )
    );

    tgmpa( $plugins, $config );

}




