@extends('layouts.app')

@section('content')
<div class="container form-container">
    <h1>Add a new contact</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br><br>
    <form id="contact-form">
        @csrf
        <div class="form-group icons-group">
            <div id="email-container" class="icon-item">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
                    required>
            </div>
            <div class="icon-item">
                <i class="fas fa-phone"></i>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number">
            </div>
            <div class="icon-item">
                <i class="fab fa-facebook"></i>
                <input type="text" name="facebook" id="facebook" class="form-control"
                    placeholder="Enter your Facebook username">
            </div>
            <div class="icon-item">
                <i class="fab fa-whatsapp"></i>
                <input type="text" name="whatsapp" id="whatsapp" class="form-control"
                    placeholder="Enter your WhatsApp number">
            </div>
            <div class="icon-item">
                <i class="fab fa-telegram"></i>
                <input type="text" name="telegram" id="telegram" class="form-control"
                    placeholder="Enter your Telegram username">
            </div>
        </div><br><br>

        <button type="button" class="btn btn-primary" id="review-button">Review of media</button>

    </form>

    <!-- Review Modal -->
    <div class="modal fade" id="review-modal" tabindex="-1" aria-labelledby="review-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="review-modal-label">Review of communication methods</h5>
                </div>
                <div class="modal-body" id="review-content">
                    <!-- سيتم تحميل محتوى المراجعة هنا -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="contact-form">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('#review-button').on('click', function () {
            var formData = $('#contact-form').serialize();

            $.ajax({
                url: '{{ route('contact.review') }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#review-content').html(response);
                    var reviewModal = new bootstrap.Modal(document.getElementById(
                        'review-modal'));
                    reviewModal.show();
                },
                error: function () {
                    alert('Failed to load review data.');
                }
            });
        });

        $('#contact-form').on('submit', function (e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('contact.store') }}',
                type: 'POST',
                data: formData,
                success: function () {
                    window.location.href = '{{ route("contact.index") }}';
                },
                error: function () {
                    alert('Failed to send data.');
                }
            });
        });
    });

</script>
@endsection
