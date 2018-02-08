<!DOCTYPE HTML>
<html>
<head>
    <title>
<?php 
global $page, $paged;

if( is_search() ){
    wp_title( '', true, 'left' );
    echo ' | ';
}else wp_title('|', true, 'right');

bloginfo('name');

if( is_front_page() ){
    echo ' | ';
    bloginfo('description');
}

if( $paged >= 2 || $page >=2 ){
    echo ' | ' . sprintf( 'Halaman %s', max($paged, $page) );
}

?>
    </title>

<!-- Style Sheet -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>">
<?php wp_head(); ?>
<!-- EndStyle Sheet -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>">
</head>
<body <?php body_class(); ?> >
<div id="wrap">
<!-- Header -->
    <div id="container">
        <header id="header" class="header">
            <a href="<?php home_url(); ?>"><h1> <?php bloginfo('name'); ?> </h1></a>
            <?php
                wp_nav_menu([
                    'container'      => 'nav',
                    'container_id'   => 'utility-nav',
                    'theme_location' => 'place_utility'
                ]);
            ?>
        </header> 
    </div>
<!-- EndHeader -->

