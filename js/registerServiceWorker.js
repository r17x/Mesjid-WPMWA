function registerServiceWorker(){
    if(window.location.href !== window.location.origin + '/')
        return false;
    if ('serviceWorker' in navigator ){
     navigator.serviceWorker.register(window.location.origin + '/sw.js', { scope: '/' }).then(() => {
           console.log('Service Worker registered successfully.');
         }).catch(error => {
           console.log('Service Worker registration failed:', error);
         });
   }    

}
registerServiceWorker();
