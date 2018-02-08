<?php

$shortcode_list = [
    'login_form'    => 'login_form',
    'register_form' => 'register_form'
];

/**
 * Register All Shortcode from
 * @var shortcode_list array
 */

foreach ($shortcode_list as $name => $func){
    add_shortcode($name, $func);
}

function login_form($args){
    get_template_part('part/login');
}
function register_form($args){
    get_template_part('part/login');
}

