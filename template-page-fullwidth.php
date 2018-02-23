<?php
/**
 * Template Name: Full Width Page
 */

 get_header(); ?>
<section id="contents" class="single w-full items-center justify-center">
<?php 
if(have_posts()):
    while( have_posts() ):
        the_post();
    get_template_part('content');
    endwhile;
endif;
?>
</section><!-- #contents end -->
<?php get_footer();?>



