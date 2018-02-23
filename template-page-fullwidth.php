<?php
/**
 * Template Name: Full Width Page
 */

 get_header(); 

?>
<section id="contents" class="contents">
<div class="container mt-4">
<?php 
if( have_posts() ):
    the_post();
?>
<article class="h-screen">
    <div class="article-header text-2xl font-light mb-2 tracking-wide text-center">
        <?php the_title(); ?>
    </div>
    <div class="article-content">
        <?php the_content(); ?>
    </div>
</article> 
<?php 
endif; ?>
</div>
</section><!-- #contents end -->
<?php get_footer();?>



