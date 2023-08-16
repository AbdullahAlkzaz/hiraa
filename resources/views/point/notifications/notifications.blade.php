@foreach ($notifications as $notification)
    @if ($loop->index < 5)
        <a class="d-flex" href="{{ $notification->url ?? 'javascript:void(0)' }}">
            <div class="list-item d-flex align-items-start">
                <div class="me-1">
                    <div class="avatar bg-light-success">
                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                    </div>
                </div>
                <div class="list-item-body flex-grow-1">
                    <small class="notification-text"> {{ $notification['body'] }}</small>
                </div>
            </div>
        </a>
    @else
        <a class="d-flex show-all" href="javascript:void(0)" style="display:none !important">
            <div class="list-item d-flex align-items-start">
                <div class="me-1">
                    <div class="avatar bg-light-success">
                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                    </div>
                </div>
                <div class="list-item-body flex-grow-1">
                    <small class="notification-text"> {{ $notification['body'] }}</small>
                </div>
            </div>
        </a>
    @endif
@endforeach
<script>
    currentNotificationCount = localStorage.getItem("current_notification_count");
    new_notification_count = "{{ $notifications_count }}";
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    }
    console.log("permission: ", Notification.permission);
    if (parseInt(new_notification_count) > parseInt(currentNotificationCount)) {
        // $.playSound('http://example.org/sound.mp3');
        if (Notification.permission !== "granted") {
            Notification.requestPermission();
        } else {
            var notification = new Notification("new point notification", {
                icon: "{{ asset('images/portrait/small/point-logo.png') }}",
                body: 'New Notification Please check it',
            });

            /* Remove the notification from Notification Center when clicked.*/
            notification.onclick = function() {
                window.open("{{ url('/login') }}");
            };

            /* Callback function when the notification is closed. */
            notification.onclose = function() {
                console.log('Notification closed');
            };

        }
        Swal.fire({
            position: 'top-end',
            type: 'success',
            html: "New Notification Please check it",
            showConfirmButton: false,
            timer: 3000,
            confirmButtonClass: 'btn btn-primary',
            buttonsStyling: false,
        })
    }
    localStorage.setItem("current_notification_count", new_notification_count);
    $('.notifications-count').html("{{ $notifications_count }}")
    $('.show-all-notifications').attr('style', "display:block !important");
</script>
