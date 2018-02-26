<?php 
    $name = get_bloginfo('name');
    
?>
self.addEventListener('install', function(e) {
  e.waitUntil(
      caches.open('<?php echo $name?>').then(function(c){
          return c.addAll([
              '/',
              '/wp-content/themes/mesjid/style.css',
              '/wp-content/wp-content/themes/mesjid/img/16x16.png',
              '/wp-content/wp-content/themes/mesjid/img/apple-touch-icon-120x120.png',
              '/wp-content/wp-content/themes/mesjid/img/32x32.png',
              '/wp-content/wp-content/themes/mesjid/img/310x310.png'
          ]) ; 
      })            
  );
});
