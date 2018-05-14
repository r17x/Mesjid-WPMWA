<?php 
    $args = [
        'posts_per_page' => isset($limit) ? $limit : 5,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => isset($postType) ? $postType : 'post',
        'post_status' => 'publish' 
    ];

    $contents = new WP_Query($args); 

    echo sprintf("<h1 class='title'><a style='all:unset' href='%s'>%s</a></h1>",get_permalink( get_option('page_for_posts') ), "Artikel/Berita Terbaru");
    $single = TRUE;
    include_once('post-loop.php');
    $single = FALSE; 

    wp_reset_query(); 
