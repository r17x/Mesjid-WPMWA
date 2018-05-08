<?php get_header(); ?>
<!-- Content -->
<?php 
if( is_home() && ! is_front_page() ||  is_archive() ): 
    get_template_part('part/header-image'); 
endif; 
if( is_archive() ): 
?>
<div class="bg-green w-full text-white h-12 text-center ">
<h2 style="padding-top: .5rem" ><?php echo get_the_archive_title() ?></h2>
</div>
<?php
endif;
?>

<?php if(! is_page('search') ):?>
<section id="contents" class="contents">
    <div class="container page-archive">
    <section id="post" class="posts col-34 px-4">
        <?php if (is_search()): global $wp_query; ?>
<h3 style="margin-bottom: 1rem"> <?php echo $wp_query->found_posts ?> hasil pencarian untuk <?= esc_html($_GET['s'] ? : '')?> .</h3> 
        <?php 
            endif;
            include('post-loop.php');
         ?>
    </section>
    <div class="col-14">
    <?php get_sidebar(); ?>
    </div>
    </div>
</section>
<!-- EndContent -->

<?php 
endif; 
get_footer(); ?>
