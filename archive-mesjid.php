<?php get_header(); ?>
<!-- Content -->
<div class="bg-green w-full text-white h-12 text-center ">
<h2><?php echo post_type_archive_title() ?></h2>
</div>
<section id="contents containter" class="contents">

    <section id="post" class="posts">
        <?php 
            # list post type want to load on front page
            $content = [
                'mesjid',
            ]; 

            foreach( $content as $post_type ){
                $args     = array(
                    'post_type'      => $post_type, 
                    'posts_per_page' => '-1',
                );
                $contents = new WP_Query($args);

                $post_type_title = $post_type === 'post' ? 'berita' : $post_type; 
                echo sprintf("<h1 class='text-xl text-green-dark my-2 mb-4 border-b-2 w-full pb-2 cursor-pointer'><a style='all:unset' href='%s'>%s</a></h1>",
                    get_post_type_archive_link($post_type), strtoupper($post_type_title));
                include('post-loop.php');
                wp_reset_query(); 
            }
         ?>
    </section>
    <?php get_sidebar(); ?>
</section>
<!-- EndContent -->

<?php get_footer(); ?>

