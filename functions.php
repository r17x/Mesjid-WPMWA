<?php 
include('shortcode.php');

/* Define custom-header | carosel | slide 
 * this function for register a slide area into fron-page
 */
$defaults = array( 
    'default-image'      =>  '%s/images/top/main_image.png',
    'width'              =>  950,
    'height'             =>  295,
    'default-text-color' =>  '',
    'header-text'        => false
);

add_theme_support( 'custom-header' , $defaults );

/*
 * Define Navigation Menu
 * this function for navbar | menu | navigation
 * template hirarcy like navbar | header | etc
 */
//register_nav_menus([
//        'place_global'   => 'global_menu',
//        'place_utility' => 'utility_menu'
//]); 

/**
 * Define Thumbnail & Picture Post
 * This function for post/page/custom post featured media|imagesk
 * Thumbnail Configuration On This Theme
 */
add_theme_support('post-thumbnails');
set_post_thumbnail_size(90,90,true);
add_image_size('small_thumbnail',61,61,true);
add_image_size('category_image',658,113,true);
add_image_size('large_thumbnail',120,120,true);
add_image_size('pickup_thumbnail',302,123,true);

/**
 * Function Filter For Childs Page ShortCode
 */
add_filter( 'child-pages-shortcode-stylesheet', 'change_child_pages_shortcode_css' );
function change_child_pages_shortcode_css(){

    return get_template_directory_uri() . '/css/child-pages-shortcode/style.css';

}

/**
 * Function Register | activate widget area
 * This Function for template files sidebar*.php  or etc 
 * Primary widget register
 */
register_sidebar(array(
    'name'          => __('Primary Widget'),
    'id'            => 'primary-widget-area',
    'description'   => 'Widget Area On The Top Page',
    'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>'
));
/**
 * Secondary Widget Register
 */
register_sidebar(array(
    'name'          => __('Secondary Widget'),
    'id'            => 'secondary-widget-area',
    'description'   => 'Widget Area On The Top Page',
    'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>'
));


/** Limit quote article
 */
function cms_excerpt_more(){
    return '&nbsp;...';  
}
add_filter( 'excerpt_more', 'cms_excerpt_more' );

function cms_excerpt_length() {
    return 40; 
}
add_filter('excerpt_length', 'cms_excerpt_length');

add_post_type_support('page', 'excerpt');


function short_excerpt_length() {
    return 10; 
}

function the_short_excerpt(){
    add_filter('excerpt_length', 'short_excerpt_length' ) ;
    the_excerpt();
    remove_filter('excerpt_length','short_excerpt_length');
}

function the_pickup_excerpt(){
    add_filter('get_the_excerpt', 'get_pickup_excerpt',0  ); 
    add_filter('excerpt_length' , 'pickup_excerpt_length', 11);
    the_excerpt();
    remove_filter( 'get_the_excerpt', 'get_pickup_excerpt', 0 );
    remove_filter( 'excerpt_length', 'pickup_excerpt_length', 11 );
}

function pickup_excerpt_length(){
    return 20;
}

function get_pickup_excerpt($excerpt){
    if( $excerpt ) {
        $excerpt     = stip_tags( $excerpt ) ;
        $excerpt_len = explode(' ', $excerpt);

        if( count( $excerpt  ) > pickup_excerpt_length() ){
            $excerpt = array_splice( $excerpt_len, 0 , pickup_excerpt_length() );
            $excerpt = implode( ' ', $excerpt) . '&nbsp...' ;
            return $excerpt;
        }

    }

    return $excerpt;
}


/**
 * function category image
 */

function the_category_image(){
    global $post;
    $image = '';
    $arr_post_ancest = get_post_ancestors($post);

    if( is_singular() && has_post_thumbnail() ){
        $image = get_the_post_thumbnail(
            null, 'category_image',
            array( 'id' => 'category_image' ) 
        ); 

    } elseif ( is_page() && 
        has_post_thumbnail(
            array_pop( $arr_post_ancest  )) ){

            $image = get_the_post_thumbnail( 
                array_pop( $arr_post_ancest  ) ,
                'category_image', array('id' => 'category_image'));
    }

    if( $image == "" ){
        $src   = get_template_directory_uri() . 'images/category/default.jpg';
        $image = '<img src="' . $src . '" class="attachment-category-image wp-post-image" alt="" id="category_image"/>';
    }
    echo $image;         
}


/**
 * comment filter 
 */
add_filter( 'comments_open' , 'comments_allow_only_column' ,10 , 2);
function comments_allow_only_column( $open, $post_id ){
    if( ! in_category('column') ) 

        $open = FALSE;

    return $open;
}


/** ShortCode Post Shop
 */
add_shortcode('posts', 'posts_shortcode');
function posts_shortcode($args){

    $template  = dirname(__FILE__). '/posts.php'; 
    if(!file_exists($template) ) return;
    $def       = array( 
        'post_type'         => 'shop',
        'taxonomy'          => 'mall',
        'term'              => '',
        'orderby'           => 'asc',
        'posts_per_page'    => -1 
    );

    $args     = shortcode_atts( $def, $args);
    $posts    = get_posts($args);
    ob_start();

    foreach( $posts as $post ) {
        $post_custom = get_post_custom($post->ID) ;
        include($template);
    }

    $output  = ob_get_clean();

    return $output;
}

/****************************
 * Register Navigation Menus * 
 ****************************/
register_nav_menus([
    'place_global'  => 'Global Menu',
    'place_utility' => 'Main Menu'
]); 

add_filter( 'wp_nav_menu_items', 'custom_menus', 10, 2 );
function custom_menus($items, $args){

    if( is_user_logged_in() ){
        $logout_url  = wp_logout_url('/');
        $items      .= '<li><a href="' . $logout_url . '"> Keluar </a> </li>';
        return $items;
    }

    $items .= '<li><a href="/daftar">Daftar</a></li>' .
              '<li><a href="/masuk">Masuk</a></li>'   ;
    return $items;
}
