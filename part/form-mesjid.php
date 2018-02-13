<form method="POST">
<p>
<label>Nama Mesjd <i>Wajib diisi</i></label>
<input required  placeholder="Nama Mesjid" type="text" name="nama">
</p>
<p>
<label>Deskripsi <i>Wajib diisi</i></label>
<textarea  required name="deskripsi" placeholder="Deskripsi Mesjid">
</textarea>
</p>
   <p class="form-submit">
       <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
       <?php wp_nonce_field( 'update-user' ) ?>
       <input name="action" type="hidden" id="action" value="update-user" />
   </p><!-- .form-submit -->
<?php do_action('create_mesjid'); ?>
</form> 

