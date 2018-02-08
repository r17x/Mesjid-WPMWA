<?php 
if ( post_password_required() ) 
    return;
?>

<section id="comments">
<?php if( have_comments()  ): ?>

<h1 id="comments-title">
<?php 
    echo '"<em>'.get_the_title().'</em>" '.
        get_comments_number() . ' Komentar ';
 ?>
</h1>
<ol class="commentlist">
<?php 
    wp_list_comments('avatar_size=40');
?>
</ol>
<?php 
    if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
<nav class="navigation" > 
<ul> 
    <li class="nav-previous">
    <?php previous_comments_link('Sebelumnya'); ?>
    </li>
    <li class="nav-previous">
    <?php next_comments_link('Selanjutnya'); ?>
    </li>
</ul>
</nav>
<?php endif;
    endif;
?>

<?php comment_form(); ?>
</section> 

