/**
 * @{registerServiceWorker} register sw.js to browser
 * sw.js code in swjs.php and generate file to 
 * root folder wordpress by init.php
 * using basic input/output php function fopen fwrite fclose
 */

function registerServiceWorker(){
    if(window.location.href !== window.location.origin + '/')
        return false;
    if ('serviceWorker' in navigator ){
     navigator.serviceWorker.register(window.location.origin + '/sw.js', { scope: '/' }).then((reg) => {
           console.log('Service Worker registered successfully.');
         }).catch(error => {
           console.log('Service Worker registration failed:', error);
         });
   }    

}

/**
 * call function registerServiceWorker();
 */
registerServiceWorker();
