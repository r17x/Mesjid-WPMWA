<?php get_header(); ?>
<!-- Content -->
<section id="contents containter" class="contents">

    <section id="post" class="posts">
        <?php 
            $args     = array(
                'post_type'      => 'post',
                'posts_per_page' => '-1'
            );
            $contents = new WP_Query($args);
            include('post-loop.php');
         ?>
    </section>

</section>
<!-- EndContent -->

<?php get_footer(); ?>
