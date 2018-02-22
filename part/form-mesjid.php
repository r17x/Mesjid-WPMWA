<?php if( ! is_user_logged_in() ): ?>
<script>
window.location = '<?php echo home_url('/masuk') ?>';
</script>
<?php die; endif; ?>
<form method="POST" enctype="multipart/form-data">
<span class="bg-green-lightest">
<?php do_action('create_mesjid'); ?> 
</span>
<p>
<label>Nama Mesjd <i>Wajib diisi</i></label>
<input required  placeholder="Nama Mesjid" type="text" name="nama">
</p>
<p>
<label>Deskripsi <i>Wajib diisi</i></label>
<textarea row=5  required name="deskripsi" placeholder="Deskripsi Mesjid">
</textarea>
</p>
<fieldset>
<label>Alamat</label>
<input type="text" name="alamat" placeholder="Alamat mesjid...">
</fieldset>

<fieldset>
<label>No Telephone</label>
<input type="text" name="phone" placeholder="Alamat mesjid...">
</fieldset>

<fieldset>
<label>Gambar</label>
<input type="file" name="gambar" />
</fieldset> 

<p class="form-submit">
    <input name="simpan" type="submit" id="simpan" class="submit button" value="<?php _e('Simpan', 'mesjid'); ?>" />
    <input name="action" type="hidden" id="action" value="create-mesjid" />
    <?php wp_nonce_field('create-mesjid')?>
</p>
</form> 

