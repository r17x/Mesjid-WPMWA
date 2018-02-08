<?php 
$isPage = ! is_single(); 
?>

<article>
  <div class="article-header">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail()?></a>
  </div>
  <div class="article-content">
    <?php if( ! $isPage  ){
            the_content(); 
          }else{
            the_excerpt();
          }
     ?>
  </div>
  <div class="article-footer">
    <?php if( $isPage ): ?>
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
</article>    

