self.addEventListener('install', function(e) {
  e.waitUntil(
      caches.open('mesjid-pwa').then(function(cache){
          return cache.addAll([
              '/',
              '/wp-content/themes/mesjid/style.css',
              '/wp-content/uploads/'
          ]) ; 
      });            
      );
  });

