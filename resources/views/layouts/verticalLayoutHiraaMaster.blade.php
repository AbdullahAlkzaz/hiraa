<body
    class="vertical-layout vertical-menu-modern {{ $configData['verticalMenuNavbarType'] }} {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{ $configData['sidebarClass'] }} {{ $configData['footerType'] }} {{ $configData['contentLayout'] }}"
    data-open="click" data-menu="vertical-menu-modern"
    data-col="{{ $configData['showMenu'] ? $configData['contentLayout'] : '1-column' }}" data-framework="laravel"
    data-asset-path="{{ asset('/') }}" background="#fff !important">
    <!-- BEGIN: Header-->
    @include('panels.panels.navbar')
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    {{-- @if (isset($configData['showMenu']) && $configData['showMenu'] === true)
        @include('panels.sidebar')
    @endif --}}
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <style>
        /* .app-content{
            padding-top: 9%;
        } */
    </style>
    <div class="app-content content content-app {{ $configData['pageClass'] }}">
        <!-- BEGIN: Header-->
        {{-- <div class="content-overlay"></div> --}}
        @if ($configData['contentLayout'] !== 'default' && isset($configData['contentLayout']))
            <div class="content-area-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
                <div class="{{ $configData['contentsidebarClass'] }}">
                    <div class="content-wrapper">
                        <div class="content-body">
                            {{-- Include Page Content --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container-xxl p-0' : '' }}">
                <div class="content-body">
                    {{-- Include Page Content --}}
                    @yield('content')
                </div>
            </div>
        @endif
        {{-- include contactUs --}}
        @include('panels.panels.contactUs')

    </div>
    <!-- End: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    {{-- include footer --}}
    @include('panels.panels.footer')
    {{-- include default scripts --}}
    @include('panels.scripts')
    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    @if (Session::has('pending_transactions_badge'))
        <script>
            $(".pending_transactions_badge").text({{ Session::get('pending_transactions_badge') }});
        </script>
    @endif
    @if (Session::has('purchase_orders_badge'))
        <script>
            $(".purchase_orders_badge").text({{ Session::get('purchase_orders_badge') }});
        </script>
    @endif
    @if (Session::has('offers_badge'))
        <script>
            $(".offers_badge").text({{ Session::get('offers_badge') }});
        </script>
    @endif
    @if (Session::has('offers_badge'))
        <script>
            $(".prices_requests_badge").text({{ Session::get('prices_requests_badge') }});
        </script>
    @endif

    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src='https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js'></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>

    {{-- <script>
        getNotifications();
        const firebaseConfig = {
            apiKey: "AIzaSyDA93vimLjPC0scAGf4aLr6JXcDFK5vkmo",
            authDomain: "q-stack-fudex.firebaseapp.com",
            projectId: "q-stack-fudex",
            storageBucket: "q-stack-fudex.appspot.com",
            messagingSenderId: "932263496696",
            appId: "1:932263496696:web:1a130a5520042542e7640d",
            measurementId: "G-ZR33JPWQGF"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        // messaging.requestPermission().then(function(){
        //     console.log('Notification permission granted');
        //     getRegisterationToken();
        // }).catch(function(err){
        //     console.log("unable to het permission to notify", err);            
        // });
        navigator.serviceWorker.register("{{url(config('app.server_worker_directory'))}}")
        .then((registration) => {
            messaging.useServiceWorker(registration);
            messaging.requestPermission().then(function(){
                console.log('Notification permission granted');
                getRegisterationToken();
            }).catch(function(err){
                console.log("unable to get permission to notify", err);            
            });
        });
        function getRegisterationToken(){
            messaging.getToken({ vapidKey: 'BKi_BihzRMV6KYEXALX-4qSumhUgrv4LaW4487dXwz7b1f6-6pvwrFTXgcKc5ku4d8fAB1qkrRqfjcwFxtmdeT0' }).then((currentToken) => {
                if (currentToken) {
                    sendTokenToService(currentToken);
                } else {
                    console.log('No registration token available. Request permission to generate one.');
                }
            }).catch((err) => {
                console.log('An error occurred while retrieving token. ', err);
            });
        }

        function sendTokenToService(currentToken){
            if( !isTokenSentToService()){
                var url = "{{route('sendToken')}}";
                $.ajax({
                    type: 'POST',
                    data:{
                        token: currentToken,
                        _token: "{{ csrf_token()}}"
                    },
                    dataType: 'html',
                    url: url,
                    success: function (data) {
                        if(data){
                            setTokenSentToService(true);
                            console.log("token_send_successfully");
                        }else{
                            console.log("error");
                        }
                    },
                    error: function (err){
                        console.log(err);
                    }
                });
            }else{
                console.log("token already sent");
            }
        }
        function setTokenSentToService(sent){
            window.localStorage.setItem('sentToService', sent ? '1' : '0');
        }
        function isTokenSentToService(sent){
            return window.localStorage.getItem('sentToService') == '1';
        }

        messaging.onMessage((payload) => {
            console.log("1");
            var notification = payload.notification;
            var data = Object.entries(payload.data);
            let category = data[0][1];
            console.log('data received. ', category);
            console.log('Message received. ', notification);
            let catgories = ['order', 'offer']
            if(category == "wallet"){
                getNotifications(false);
            }else if (catgories.includes(category)){
                if(category == "order"){
                    let content = $('.purchase_orders_badge').html();
                    $('.purchase_orders_badge').html(parseInt(content) + 1);
                }else if(category == 'offer'){
                    let content = $('.offers_badge').html();
                    $('.offers_badge').html(parseInt(content) + 1);
                }
            }
            toastr['info']('👋 '+ notification.body +' .', notification.title, {
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        });

        function getNotifications(firstRequest = true){
            var url = "{{route('notifications.index')}}" + "?first_request=" + firstRequest;
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: url,
                success: function (data) {
                    $('.store-notifications').html(data);
                },
                error: function (err){
                    console.log(err);
                }
            });
        }

        $('.show-all-notifications').on('click',function(){
            $(this).attr('style', "display:none !important");
            $('.show-all').attr('style', "display:block !important");
        });
    </script> --}}
    <script>
        var currentNotificationCount = 0;
        var new_notification_count = 0;

        function getNotifications(firstRequest = true) {
            console.log("notification listener");
            var url = "{{ route('notifications.index') }}";
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: url,
                success: function(data) {
                    $('.store-notifications').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        $('.show-all-notifications').on('click', function() {
            $(this).attr('style', "display:none !important");
            $('.show-all').attr('style', "display:block !important");
        });

        setInterval(function() {
            getNotifications();
        }, 2000);
    </script>

    @yield('added-scripts')
</body>

</html>
