<?php get_header() ?>

<section id="contents container" class="contents ">
<section class="posts">
    <?php 
if( have_posts() ):
    while( have_posts() ):
        the_post();
    get_template_part('part/article');
    endwhile;
    //if( in_category('column') )
    //    comments_template('', TRUE);
endif;
    ?>
</section>
<?php get_sidebar();  ?>
</section>
<?php
    get_footer();
?>
