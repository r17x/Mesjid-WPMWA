<?php 
get_header();
global $current_user, $wp_roles;

$error = array();
?>
<section class="contents">
<section class="posts w-3/4">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
get_template_part('part/article'); 
endwhile; ?>
</section>
<section class="w-auto">
<?php 
global $wp;
if ( is_user_logged_in() && (home_url( $wp->request ).'/' === get_author_posts_url(get_current_user_id())) ) : ?>
<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
<?php include('part/form-profile.php'); ?>
<?php endif; ?>
</section>
</section>
<?php else: ?>
    <p class="no-data">
        <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
    </p><!-- .no-data -->
<?php endif; 


get_footer();

?>
