<?php get_header(); ?>
<!-- Content -->
<section id="contents" class="contents">
<?php get_template_part('part/header-image'); ?>
    <div class="container">
    <section class="posts">
<?php if( is_front_page() ): ?>
<?php endif; ?>
<div class="flex flex-wrap">
<?php 
# list post type want to load on front page
$content = [
    'mesjid',
    'post'            
]; 

foreach( $content as $post_type ):
    $args     = array(
        'post_type'      => $post_type, 
        'posts_per_page' => '3',
    );
    $contents = new WP_Query($args);
?>
<div class="w-1/2 p-2">
<?php 
    $post_type_title = $post_type === 'post' ? 'berita' : $post_type; 
    echo sprintf("<h1 class='title'><a style='all:unset' href='%s'>%s</a></h1>",
        get_post_type_archive_link($post_type), strtoupper($post_type_title));
    include('post-loop.php');
?>
</div>
<?php
    wp_reset_query(); 
endforeach
?>
</div>
    </section>
</div>
</section>
<!-- EndContent -->

<?php get_footer(); ?>
