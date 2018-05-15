<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s">
        <?php echo _e('Cari', get_bloginfo('name') ) ?>
        <input type="text" value="" name="s" id="s" required placeholder="<?php echo _e('ketik kata kunci yang ingin dicari...', get_bloginfo('name'))?>" />
        </label>
        <input type="submit" id="searchsubmit" value="Cari" />
    </div>
</form>
