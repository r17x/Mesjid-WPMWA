<article>
  <div class="article-header">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail()?></a>
  </div>
  <div class="article-content">
    <?php the_excerpt(); ?>
  </div>
  <div class="article-footer">
    <a class="btn btn-s continue" href="<?php the_permalink();?>">Baca Selengkapnya</a>
  </div>
</article>    

