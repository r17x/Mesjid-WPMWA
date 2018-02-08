        <article>
            <header class="article-header">
            <?php the_category_image(); ?>
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>
<?php 
if(is_single() && in_category('column' ) ): 
    get_template_part('social-button');
endif;?>
        </header>
            <section class="article-content;">
                <?php the_content(); ?>
            </section>
<?php 
if(is_single() && in_category('column' ) ): 
    get_template_part('social-button');
endif;?>
<?php if (is_single() ): ?>
<nav class="adjacent_post_links">
<ul> 
<li class="previous">
    <?php previous_post_link('%link', '%title', true);?>
</li>
<li class="next">
    <?php next_post_link('%link', '%title', true);?>
</li>
</ul>
</nav>
<?php endif; ?>
        </article>


