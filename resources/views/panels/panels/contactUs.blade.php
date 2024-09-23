

<div class="container text-center" dir="rtl">
    <!-- Call Center Icon -->
    <div class="call-center-icon" id="callCenterIcon">
        <i class="fas fa-headset"></i>
    </div>

    <!-- Contact Icons (Hidden initially) -->
    <!-- Contact Icons (Hidden initially) -->
    <div class="contact-icons" id="contactIcons">
        @foreach($contactIcons as $contactIcon)
            @if($contactIcon['value'])
                <a href="{{ $contactIcon['link'] }}" target="_blank" class="d-block">
                    <i class="{{ $contactIcon['iconClass'] }}"></i>
                </a>
            @endif
        @endforeach
    </div>


</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#callCenterIcon').click(function () {
            // Toggle visibility of contact icons using slide effect
            $('#contactIcons').slideToggle();
        });
    });

</script>
