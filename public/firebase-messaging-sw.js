
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('../firebase-messaging-sw.js')
    .then(function(registration) {
    console.log('Registration successful, scope is:', registration.scope);
    }).catch(function(err) {
    console.log('Service worker registration failed, error:', err);
    });
}


importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js');


firebase.initializeApp({
    apiKey: "AIzaSyDA93vimLjPC0scAGf4aLr6JXcDFK5vkmo",
    authDomain: "q-stack-fudex.firebaseapp.com",
    projectId: "q-stack-fudex",
    storageBucket: "q-stack-fudex.appspot.com",
    messagingSenderId: "932263496696",
    appId: "1:932263496696:web:1a130a5520042542e7640d",
    measurementId: "G-ZR33JPWQGF"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();