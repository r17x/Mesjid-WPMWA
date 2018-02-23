<?php
$img = sprintf("%s/img/custom_header.jpg", get_template_directory_uri());

if( ! is_null(header_image())){
    $img = header_image(); 
}?>

<div class="h-64 w-full bg-contain bg-center bg-no-repeat bg-grey-lighter"
style="background-image: url('<?php echo $img ?>')"
>
</div>

