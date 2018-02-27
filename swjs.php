<?php
    /**
     * @var string name your wordpress name
     * @var string themeUri wordpress file to uri|url
     * @var array  list all static files on theme wordpress 
     */
    $name      = get_bloginfo('name'); 
    $themeURI = get_template_directory_uri(); 
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
    /**
     * this anonymous function for change list static to uri
     * example /style change to http://web.domain/theme/path/style.css
     * @return array 
     */
    $list = array_map( function($u) use($themeURI){
        if ($u === '/')
            return $u;

        return $themeURI . $u; 
    }, $list);

    /** 
     * @var array list change to string
     */
    $list = sprintf(
        '"%s"',
        implode('","', $list)
    );

    /**
     * @var string name to javascript string var CACHE_NAME
     * @var string list to javascript array  var CACHE_LIST
     */
?>
var CACHE_NAME = '<?php echo $name?>',
    CACHE_LIST = [<?php echo $list ?>],
    SW_UPDATE  = function(req){
        return caches.open(CACHE_NAME).then(function(cache){
            return fetch(req).then(function(res) {
                return cache.put(req, res.clone()).then(function(){
                    return res;
                });
            });
        }); 
    },
    SW_REFRESH = function(res){
        return self.clients.matchAll().then(function(clients){
            clients.forEach(function(client){
                var message = {
                    type: 'refresh',
                    url: res.url,
                    eTag: res.headers.get('ETag')
                };
                client.postMessage(JSON.stringify(message));
            });
        });
    };
/**
 * Create Cache All  
 */
console.log(self); 
self.addEventListener('install', function(e) {
  e.waitUntil(
      caches.open(CACHE_NAME).then(function(c){
          console.log('cache all created :D');
          return c.addAll(CACHE_LIST); 
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
    
    e.waitUntil(
        SW_UPDATE(e.request)
        .then(SW_REFRESH)
    );
});

/**
 * Create Install Prompt | Added To Homescreen
 */
self.addEventListener('beforeinstallprompt', function(e) {
    e.userChoice.then( function(choiceResult){
        console.log(choiceResult.outcome); 
        if(choiceResult.outcome == 'dismissed') 
            console.log('User is Good Cancel');
        else
            console.log('User Added TO Chrome'); 
    });
}); 

self.addEventListener('activate', function(e){
    console.log('activate state SW.js'); 
   var CACHE_WITHELIST = [ CACHE_NAME ];

    e.waitUntil(
        caches.keys().then(function(keyList){
            return Promise.all(keyList.map(function(key){
                if ( CACHE_WITHELIST.indexOf(key) === - 1 ){
                    return caches.delete(key); 
                }
            }))
        })
    );
});
