<?php get_header(); ?>
<!-- Content -->
<section id="contents containter" class="contents h-screen overflow-x-scroll">
    <section id="post" class="posts flex justify-center items-center">
<?php if( is_front_page() ): ?>


    <img 

        src="<?php header_image();?>" 

                width="<?php get_custom_header()->width;?>" 

                        height="<?php get_custom_header()->height;?>" 

                                alt="" />


<?php endif; ?>
        <?php 
            # list post type want to load on front page
            $content = [
                'mesjid',
                'post'            
            ]; 

            foreach( $content as $post_type ){
                $args     = array(
                    'post_type'      => $post_type, 
                    'posts_per_page' => '3',
                );
                $contents = new WP_Query($args);

                $post_type_title = $post_type === 'post' ? 'berita' : $post_type; 
                echo sprintf("<h1 class='text-xl text-green-dark text-center my-2 mb-4 border-b-2 w-3/4 pb-2 cursor-pointer'><a style='all:unset' href='%s'>%s</a></h1>",
                    get_post_type_archive_link($post_type), strtoupper($post_type_title));
                include('post-loop.php');
                wp_reset_query(); 
            }
         ?>
    </section>
</section>
<!-- EndContent -->

<?php get_footer(); ?>
