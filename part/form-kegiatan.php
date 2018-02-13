<form method="POST">

<input type="text" name="hello" >
                    <p class="form-submit">
                        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </p><!-- .form-submit -->
<?php do_action('create_kegiatan'); ?>
</form> 
