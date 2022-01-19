<html>
    <title>Firebase Messaging Demo</title>
    <style>
        div {
            margin-bottom: 15px;
        }
    </style>
    <body>
        <div id="token"></div>
        <div id="msg"></div>
        <div id="notis"></div>
        <div id="err"></div>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
        <script>
            // MsgElem = document.getElementById('msg');
            // TokenElem = document.getElementById('token');
            // NotisElem = document.getElementById('notis');
            // ErrElem = document.getElementById('err');


            // TODO: Replace firebaseConfig you get from Firebase Console
            var firebaseConfig = {
                apiKey: "AIzaSyALd1SS3rbvhRyxpF-6c6mG-V23kmjnyK0",
                authDomain: "presinsi-notification-smkn4.firebaseapp.com",
                projectId: "presinsi-notification-smkn4",
                storageBucket: "presinsi-notification-smkn4.appspot.com",
                messagingSenderId: "113365923337",
                appId: "1:113365923337:web:1f3c6ac3966ed1fe486ad8",
                measurementId: "G-BE4EM99N78"
            };
            
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();
            // firebase.subscribeToTopic();
            // console.log(firebase.subscribeToTopic())
            // messaging.getToken({vapidKey: ""});
            messaging.getToken({ vapidKey: 'BCjygM6s4-pcigxCgdm7ec7wp2nkLsmQwEgWDn_YWLEpOO0f5zrCP2O9GPOZWkTWTl9Xuh_9hNAF1DZk4K7QQYo' }).then((currentToken) => {
            if (currentToken) {
                    // Send the token to your server and update the UI if necessary
                    // ...


            const queryString = window.location.search;

            const urlParams = new URLSearchParams(queryString);

            const iduser = urlParams.get('id')

            // console.log(page_type);

                    console.log(currentToken);
                    // iduser='aas'
                    // console.log('https://absensi.smkn4bogor.sch.id/vas?id='+iduser+'&token='+currentToken)
                    alert('https://absensi.smkn4bogor.sch.id/vas?id='+iduser+'&token='+currentToken)
                    fetch('https://absensi.smkn4bogor.sch.id/vas?id='+iduser+'&token='+currentToken)
                    axios.get('https://absensi.smkn4bogor.sch.id/vas?id='+12+'&token='+123)
                    .then(function (response) {
                    console.log(response);
                    })
            } else {
                // Show permission request UI
                console.log('No registration token available. Request permission to generate one.');
                // ...
            }
            }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
            // ...
            });


            messaging
                .requestPermission()
                .then(function () {
                    MsgElem.innerHTML = 'Notification permission granted.';
                    console.log('Notification permission granted.');
                    // get the token in the form of promise
                    return messaging.getToken();
                })
                .then(function (token) {
                    // TokenElem.innerHTML = 'Device token is : <br>' + token;
                })
                .catch(function (err) {
                    // ErrElem.innerHTML = ErrElem.innerHTML + '; ' + err;
                    // console.log('Unable to get permission to notify.', err);
                });
            let enableForegroundNotification = true;
            messaging.onMessage(function (payload) {
                // console.log('Message received. ', payload);
                // NotisElem.innerHTML =
                //     NotisElem.innerHTML + JSON.stringify(payload);

                if (enableForegroundNotification) {
                    let notification = payload.notification;
                    navigator.serviceWorker
                        .getRegistrations()
                        .then((registration) => {
                            registration[0].showNotification(notification.title);
                        });
                }
            });


           
        </script>
    </body>
</html>
