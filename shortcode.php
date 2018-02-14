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

function message($title, $message){
    $msg  = "<h1> %s </h1>";
    $msg .= "<p> %s </p";
    return sprintf( $msg, 
        isset($title) ? $title : 'Notification',
        isset($message) ? $message : "Congratulation !"
    );
}

function register_form($args){
    $fields = [
        'username',
        'email',
        'password',
    ]; 

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if( ! is_array(checkField($fields, TRUE)) )
            return message(
                'Gagal !',
                "Tolong Periksa Ulang Inputan anda!" 
            );
    }
    get_template_part('part/register');
}

/**
 * Validating : https://codex.wordpress.org/Validating_Sanitizing_and_Escaping_User_Data
 *
 * @method checkField
 * Method for checking field is valid & controlling user input from post or get method
 * @param $fields array
 * @param $post   bool
 * @return $data array
 */
function checkField($fields=[], $post=False){
    $data   = [];
    $isPost = $post ? $_POST : $_GET;
    foreach( $fields as $field ){
        if( in_array( $field, $isPost  ) &&
             ! empty($isPost[$field]) ){
            $data[$field] = $isPost[$field] ;
        }
    }

    if ( count($data) != 0 ||
        ( count($data) <= count($fields) || 
            count($data) >= $count($fields) ) )
        return FALSE;

    return $data;
}
add_action('edit_user_profile', 'update_user');
function update_user(){
    /* Ref : https://codex.wordpress.org/Function_Reference/wp_get_current_user */
    global $current_user;
    $fields = [
        'first-name'  => 'first_name',
        'last-name'   => 'last_name',
        'email'       => 'user_email',
        'url'         => 'user_url',
        'description' => 'description'
    ];
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        /* check if password input */
        if($_POST['pass1'] != $_POST['pass2']){
            return message('Info', 'Nampaknya Password yang di input kurang tepat!');
        }else if( ! empty($_POST['pass1']) ){
            wp_set_password(
                $_POST['pass1'],
                $current_user->ID 
            );
            echo "<script> window.location='/masuk'; </script>"; 
        }
        $data = ['ID' => $current_user->ID];
        foreach( $fields as $field => $name ){
            if( in_array($field, array_keys($_POST)) ){
                $data[$name] = $_POST[$field];
            }
        }
        $errors = wp_update_user($data);
        echo "<script> window.location='" .  get_author_posts_url($current_user->ID) . "'; </script>"; 
    }
}

add_action('create_kegiatan', 'create_kegiatan');
function create_kegiatan(){
 if( ! is_user_logged_in() ){
    $_SESSION['NOTICE'] = message('Login', "Anda Harus Login terlebih dahulu."); 
    echo sprintf("<script> window.location = '%s' ;</script>", 
            home_url('masuk')
        );
    die; 
 }
    if( $_SERVER['REQUEST_METHOD'] === 'POST' )
    print_r($_POST);
}

add_shortcode('form_kegiatan' , 'form_kegiatan');

function form_kegiatan(){
    get_template_part('part/form-kegiatan'); 
}
add_action('create_mesjid', 'create_mesjid');
function create_mesjid(){
    if( $_SERVER['REQUEST_METHOD'] === 'POST' )
    print_r($_POST);
}

add_shortcode('form_mesjid' , 'form_mesjid');

function form_mesjid(){
    get_template_part('part/form-mesjid'); 
}
