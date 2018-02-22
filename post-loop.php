<?php 
if( $contents->have_posts() ):
    while( $contents->have_posts() ):
        $contents->the_post();
        include('part/article.php');
    endwhile;
    # Reset Query And Data
endif;

