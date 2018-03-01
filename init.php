<?php 

if (! function_exists( 'mesjidThemeSetup' )){
    function mesjidThemeSetup(){
        checkPage(); 
        generateManifest(ABSPATH);
    }
}

add_action('after_setup_theme', 'mesjidThemeSetup'); 
function getSwJs(){
    ob_start();
    include('swjs.php');
    return ob_get_clean(); 
}
function generateManifest($path){
    if ( empty( mesjidThemeGetOption('active_pwa') ) ) 
        return;
    $imgPath  = get_template_directory_uri() .'/img/%s';
    $manifest = [
        'short_name' => get_bloginfo('name'),
        'name' => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'icons' =>  [
            [
                'src' => sprintf($imgPath, 'favicon.ico'),
                'sizes' => "64x64 32x32 24x24 16x16",
                "type"=> "image/x-icon" 
            ],
            [
                'src' => sprintf($imgPath, '192.png'),
                'sizes' => "192x192",
                "type"=> "image/png" 
            ],
            [
                'src' => sprintf($imgPath, '144.png'),
                'sizes' => "144x144",
                "type"=> "image/png" 
            ],
            [
                'src' => sprintf($imgPath, '512.png'),
                'sizes' => "512x512",
                "type"=> "image/png" 
            ],
            [
                'src' => sprintf($imgPath, 'apple-touch-icon-120x120.png'),
                'sizes' => "120x120",
                "type"=> "image/png" 
            ]
        ],
        "start_url" => get_bloginfo('url'),
        "display" => "standalone",
        "theme_color" => "#38c172",
        "background_color" => "#f8fafc"
    ]; 

    $f = fopen( $path . 'manifest.json', 'w');
    fwrite($f, json_encode($manifest));
    fclose($f);
    $f = fopen( $path. 'sw.js' , 'w');
    $js = getSwJs();
    fwrite($f, $js);
    fclose($f);
}

add_action( 'wp_head', function(){
    if ( empty( mesjidThemeGetOption('active_pwa') ) ) 
        return;
    $imgPath  = get_template_directory_uri() .'/img';
    echo sprintf('
        <link rel="manifest" href="%s/manifest.json" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="%s/apple-touch-icon-120x120.png" />
        <link rel="icon" type="image/png" href="%s/32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="%s/16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="%s/144.png" sizes="144x144" />
        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-square310x310logo" content="%s/310.png" />
        <meta name="theme-color" content="#38c172"/>
        ', get_bloginfo('url') , $imgPath, $imgPath, $imgPath, $imgPath, $imgPath, $imgPath, $imgPath );
} );
add_action( 'wp_enqueue_scripts', function(){
    if ( empty( mesjidThemeGetOption('active_pwa') ) ||
        is_super_admin(get_current_user_id())
     ) {
        wp_enqueue_script( 'javascript', get_template_directory_uri() . '/js/unregister.js' );
        return; 
    }
    wp_enqueue_script( 'javascript', get_template_directory_uri() . '/js/registerServiceWorker.js' );
} ); 

function checkPage(){
    $listPage = [
        'masuk'  => "[login_form]",
        'daftar' => "[register_form]"
    ];

    foreach( $listPage as $page => $content ) {
        $title = $page;
        $page = get_page_by_title($page);
        if( is_null($page) ){
            $page = [
                'post_content' => $content,
                'post_author'  => get_current_user()->ID,
                'post_title'   => ucwords($title),
                'post_type'    => 'page',
                'post_status' => 'publish',
            ];

            $page = wp_insert_post($page);
            update_post_meta( $page , '_wp_page_template', 'template-page-fullwidth.php' );
        }
        continue;
    }

}
