<?php $isSingle =  is_single(); ?>
<article>
  <div class="article-header">
    <h1>
        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
    </h1>
    <small>
        <?php echo get_the_date(); ?>
        oleh <strong> <?php the_author(); ?> </strong> 
    </small> <br>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('category_image')?></a>
  </div>
  <div class="article-content">
<?php
if(  $isSingle OR $single  ){
    the_content(); 
}else{
    the_excerpt();
}

if( $isSingle && get_post_type() === 'mesjid')
    the_meta();
?>
  </div>
<?php if(! $isPage): ?>
  <div class="article-footer">
    <?php if(! $isSingle and ! $single  ): ?>
    <a class="btn btn-s continue" href="<?php the_permalink();?>">Baca Selengkapnya</a>
    <?php else: ?>
        <nav class="article-nav">
        <ul> 
        <li class="previous">
            <?php previous_post_link('%link', '%title', true);?>
        </li>
        <li class="next">
            <?php next_post_link('%link', '%title', true);?>
        </li>
        </ul>
        </nav> 
    <?php endif;?>
  </div>
    <?php if ( is_single()  )
        comments_template();
    ?>
<?php endif; ?>
</article>    

