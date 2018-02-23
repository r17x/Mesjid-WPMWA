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

            wp_insert_post($page);
        }
        continue;
    }

}
