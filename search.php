<?php 
/*
 * Template Name: Search Page
 */
get_header();
?>

<div class="wrap">
    <div id="primary" style="min-height: 30rem;" class="content-area">
        <main id="main" class="site-main" role="main">

<?php 
get_template_part('part/searchform'); 
get_template_part('archive'); 
?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); 
