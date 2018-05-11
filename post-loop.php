<?php 
if( isset($contents) && $contents->have_posts() ):
    while( $contents->have_posts() ):
        $contents->the_post();
        include('part/article.php');
    endwhile;
elseif( have_posts()):
    while( have_posts() ):
        the_post();
        include('part/article.php');
    endwhile;
endif;

?>
<div class="pagination">
<?= paginate_links(); ?>
</div>
