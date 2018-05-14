<?php get_header(); ?>
<!-- Content -->
<section id="contents" class="contents">
<?php get_template_part('part/header-image'); ?>
    <div class="container page-archive">
    <section class="posts col-34 px-4" id="post">
<?php if( is_front_page() ): ?>
<?php endif; ?>
<div class="flex flex-wrap">
<?php 
# list post type want to load on front page
# Get All Categories
# Get Post By Category
#
$limit = 1;

include_once('latest-post.php'); 

unset($limit);

$categories = [
    'orderby' => 'name',
    'order'   => 'DESC',
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
<div class="col-2">
<?php 
    echo sprintf("<h1 class='title'><a style='all:unset' href='%s'>%s</a></h1>",
        get_category_link($category->term_id), strtoupper($category->name));
    include('post-loop.php');
?>
</div>
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
