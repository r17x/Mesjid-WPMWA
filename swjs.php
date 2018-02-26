<?php 
    $name      = get_bloginfo('name');
    $themePath = get_template_directory_uri();

    $list = [
        '/',
        '/style.css',
        '/img/16.png',
        '/img/apple-touch-icon-120x120.png',
        '/img/32.png',
        '/img/310.png', 
        '/img/192.png', 
        '/img/144.png', 
        '/img/512.png', 
    ];

    $list = array_map( function($u) use($themePath){
        if ($u === '/')
            return $u;

        return $themePath . $u; 
    }, $list);
    
?>


/**
 * Create Cache All 
 */
self.addEventListener('install', function(e) {
  e.waitUntil(
      caches.open('<?php echo $name?>').then(function(c){
          console.log('cache all created :D');
          return c.addAll([
            <?php echo '"' . implode('","', $list) . '"' ?>
          ]); 
      })
  );
});

/**
 * Create Fetch Catch for response cache if match
 */
self.addEventListener('fetch', function(e) {
    // check all request url
    console.log(e.request.url);
    e.respondWith(
        caches.match(e.request).then( function(res){
            return res || fetch(e.request); 
        })
    );
});

//Button Form 
self.addEventListener('beforeinstallprompt', function(e) {
    e.userChoice.then( function(choiceResult){
        console.log(choiceResult.outcome); 
        if(choiceResult.outcome == 'dismissed') 
            console.log('User is Good Cancel');
        else
            console.log('User Added TO Chrome'); 
    });
}); 


