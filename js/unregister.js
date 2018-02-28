/**
 * Ref : https://gist.github.com/inian/1c363e1e8cfcf6e7a19b7d9f43809100
 */
try {
   navigator.serviceWorker.getRegistrations().then(function(registrations) {
       registrations.forEach(function(registration) {
           console.log('removing registration', registration);
           registration.unregister();
       })
   })
}
catch (e) {
   console.log('failed to unregister all service workers', e);
}

