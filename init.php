<?php 

if (! function_exists( 'mesjidThemeSetup' )){
    function mesjidThemeSetup(){
        checkPage(); 
    }
}

add_action('after_setup_theme', 'mesjidThemeSetup'); 
function checkPage(){
    $listPage = [
        'masuk'  => "[login_form]",
        'daftar' => "[register_form]"
    ];

    foreach( $listPage as $page => $content ) {
        $page = get_page_by_title($page);
        if( is_null($page) ){
            $page = [
                'post_content' => $content,
                'post_author'  => get_current_user()->ID,
                'post_title'   => ucwords($page),
                'post_type'    => 'page',
            ];

            wp_insert_post($page);
        }
        continue;
    }

}
