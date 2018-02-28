<?php get_header(); ?>
<!-- Content -->
<?php 
if( is_home() && ! is_front_page() ): 
    get_template_part('part/header-image'); 
elseif( is_archive() ): 
?>
<div class="bg-green w-full text-white h-12 text-center ">
<h2><?php echo get_the_archive_title() ?></h2>
</div>
<?php
endif;
?>
<section id="contents" class="contents">
    <div class="container page-archive">
    <section id="post" class="posts col-34 px-4">
        <?php 
                include('post-loop.php');
         ?>
    </section>
    <div class="col-14">
    <?php get_sidebar(); ?>
    </div>
    </div>
</section>
<!-- EndContent -->

<?php get_footer(); ?>
