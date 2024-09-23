@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush
@section('content-header')

@endsection

@section('content')
<br><br>

<h2 class="content-header-page">{{ $course->name }}</h2>

<div class="card mb-2">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="card-title">{{ $course->title }}</h1>
                    <a class="btn btn-primary share-link" href="#"
                        data-url="{{ route('courses.show', $course->id) }}">
                        <i data-feather="share-2"></i>
                        <span>Share</span>
                    </a>

                </div>
                <p class="card-text">{!! $course->description !!}</p>
                <!-- تحديد طول النص -->
                <a href="#" class="btn btn-primary">Free Trial</a>
                <a href="{{ route('prices.show') }}" class="btn btn-primary">Prices</a>
                <a href="{{ route('prices.show') }}" class="btn btn-primary">Reviews</a>
                <p class="card-text"><small class="text-muted">Last updated {{ $course->updated_at }}</small></p>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image"
                class="img-fluid rounded-start" style="object-fit: cover; height: 100%; width: 100%;">
        </div>
    </div>
</div>
@if(!empty($course->card))
    @php
        $cards = json_decode($course->card, true); // فك تشفير JSON إلى مصفوفة
    @endphp
    @foreach($cards as $card)
        <div class="card text-center">
            <div class="card-body">
                <div class="card-content">

                    <div class="card-item">
                        <h3>{{ $card['title'] }}</h3>
                        <hr>
                        <p>{!! $card['body'] !!}</p>
                        <a href="#"
                            class="btn btn-primary waves-effect waves-float waves-light">{{ $card['button_name'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div>No cards available.</div>
@endif
<h4 class="content-header-page">courses</h4>

<div class="row">
    @if($randomCourses->count() > 0)
        @foreach($randomCourses as $course)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top"
                        alt="{{ $course->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit(strip_tags($course->description), 100, '...') }}
                        </p>
                        <a href="{{ route('courses.show', $course->id) }}"
                            class="btn btn-primary">Read more..</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No courses available.</p>
    @endif
</div>
@stop

    @section('page-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function () {
            $('.share-link').on('click', function (e) {
                e.preventDefault();
                var link = $(this).data('url');
                showShareModal(link);
            });
        });

        function showShareModal(link) {
            Swal.fire({
                title: 'Share this link',
                html: `
                    <p>Copy this link to share:</p>
                    <input type="text" id="shareLink" class="swal2-input" value="${link}" readonly>
                    <br>
                    <p>Share on:</p>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(link)}" target="_blank" class="btn btn-primary">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(link)}" target="_blank" class="btn btn-info">Twitter</a>
                        <a href="https://www.linkedin.com/shareCourse?mini=true&url=${encodeURIComponent(link)}" target="_blank" class="btn btn-primary">LinkedIn</a>
                        <a href="https://www.threads.net/share?url=${encodeURIComponent(link)}" target="_blank" class="btn btn-secondary">Threads</a>
                        <a href="https://www.instagram.com/?url=${encodeURIComponent(link)}" target="_blank" class="btn btn-dark">Instagram</a>
                    </div>
                    <style>
                        .share-buttons {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 10px;
                            margin-top: 10px;
                        }
                        .share-buttons .btn {
                            flex: 1 1 calc(20% - 10px);
                            text-align: center;
                            min-width: 100px;
                            padding: 10px;
                            border-radius: 5px;
                        }
                    </style>
                `,
                showCancelButton: true,
                confirmButtonText: 'Copy Link',
                cancelButtonText: 'Close',
                preConfirm: () => {
                    const linkInput = document.getElementById('shareLink');
                    linkInput.select();
                    document.execCommand('copy');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Link copied to clipboard!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });

        }

    </script>


    @endsection
