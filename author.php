<?php 
get_header();
global $current_user, $wp_roles;
$error = array();
?>

<section  id="contents" class="contents">
    <div class="container page-archive">
        <section id="post" class="posts col-34  mt-4" >
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                get_template_part('part/article'); 
            endwhile; ?>
        <?php else: ?>
            <p class="no-data">
                <?php _e('Mohon Maaf Anda Belum menambahkan konten, silahkan menambahkan baik itu berita atau mesjid di sekitar rumah anda , terima kasih!', 'profile'); ?>
            </p><!-- .no-data -->
        <?php endif; ?>
        </section>
        <section class="col-14">
        <?php 
        global $wp;
        if ( is_user_logged_in() && (home_url( $wp->request ).'/' === get_author_posts_url(get_current_user_id())) ) : ?>
        <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
        <div class="m-4" >
        <?php include('part/form-profile.php'); ?>
        <?php endif; ?>
        </div>
        </section>
    </div>
</section>

<?php
get_footer();
?>
