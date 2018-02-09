<?php

$shortcode_list = [
    'login_form'    => 'login_form',
    'register_form' => 'register_form'
];

/**
 * Register All Shortcode from
 * @var shortcode_list array
 */
$redirect_to_home = function(){
    echo "<script> window.location = '" . home_url() . "'</script>";
};

foreach ($shortcode_list as $name => $func){
    add_shortcode($name, $func);
}

function login_form($args){
    global $redirect_to_home; 
    if ( is_user_logged_in() ){
        $redirect_to_home();
        die; 
    }
    return wp_login_form();
//    get_template_part('part/login');
}
function register_form($args){
    get_template_part('part/register');
}

