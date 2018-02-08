<article <?php post_class(); ?>>
                <a href="<?php the_permalink();?> ">
            <?php the_post_thumbnail('large_thumbnail');?>
                </a>
            <header class="entry-header">
            <time 
                  class="entry-time"
                  pubdate="pubdate"
                  datetime="<?php the_time('Y-m-d');?>"
            >
            </time>
<?php  if(!is_search()): ?>
<span class="author vcard">
<?php the_author_posts_link(); ?>
</span>
<?php endif;?>
            <h1 class="page-title">
                <a href="<?php the_permalink();?> ">
                <?php the_title(); ?>
                </a>
            </h1>
            </header>
            <section class="entry-content">
                <?php the_excerpt(); ?>
            </section>
        </article>



