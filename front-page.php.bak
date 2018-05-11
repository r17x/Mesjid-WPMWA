<?php get_header(); ?>
<!-- Content -->
<section id="contents" class="contents">
<?php get_template_part('part/header-image'); ?>
    <div class="container page-archive">
    <section id="post" class="posts col-34 px-4">
<?php if( is_front_page() ): ?>
<?php endif; ?>
<div class="flex flex-wrap">
<?php 

$categories = [
    'orderby' => 'name',
    'order'   => 'ASC',
]; 

$categories = get_categories($categories); 
foreach( $categories as $category ):
    // Skip If Category slug uncategorized or tak berkategori 
    if ( in_array($category->slug, ['uncategorized', 'tak-berkategori'] ))
        continue;
    $args     = array(
        'posts_per_page' => '3',
        'category__in'   => [ $category->term_id ]
    );
    $contents = new WP_Query($args);
?>
<?php 
    echo sprintf("<h1 class='title'><a style='all:unset' href='%s'>%s</a></h1>",
        get_category_link($category->term_id), strtoupper($category->name));
    include('post-loop.php');
?>
<?php
    wp_reset_query(); 
endforeach; # end foreach for categories
?>
</div>
    </section>
    <div class="col-14">
    <?php get_sidebar(); ?>
    </div>
</div>
</section>
<!-- EndContent -->

<?php get_footer(); ?>
