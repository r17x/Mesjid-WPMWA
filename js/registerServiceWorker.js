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


//Button Form 
window.addEventListener('beforeinstallprompt', e => {
    e.userChoice.then(choiceResult => {
        console.log(choiceResult.outcome); 

        if(choiceResult.outcome == 'dismissed') 
            console.log('User is Good Cancel');
        else
            console.log('User Added TO Chrome'); 

    });
});
