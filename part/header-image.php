<?php
$img = sprintf("%s/img/custom_header.jpg", get_template_directory_uri());
?>
<div class="h-64 w-full bg-contain bg-center bg-no-repeat bg-grey-lighter"
style="background-image: url('<?php if (header_image()) header_image(); else   echo $img; ?>')"

>
</div>

