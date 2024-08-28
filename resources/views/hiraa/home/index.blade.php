@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush
<style>
    .fade-in-right,
    .fade-in-left {
        opacity: 0;
        transition: all 1s ease-in-out;
    }

    .fade-in-right {
        transform: translateX(100%);
    }

    .fade-in-left {
        transform: translateX(-100%);
    }

    .fade-in-left h2,
    .fade-in-right h2 {
        display: inline-block;
        padding-bottom: .8rem;
        margin-bottom: 1rem;
        border-bottom: .5rem solid #002f78 !important;

    }

    .fade-in-left p,
    .fade-in-right p {
        color: black;
    }

    .animated {
        opacity: 1 !important;
        transform: translateX(0) !important;
    }

    .footer {
        background-color: #343a40;
        color: white;
        padding: 20px 0;
    }

    .footer a {
        color: #ffffff;
        text-decoration: none;
    }

    .footer a:hover {
        color: #d4d4d4;
    }
</style>

<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        /* يمكنك تعديل الطول هنا */
        object-fit: cover;
    }
</style>
@section('content')

    <div class="container mt-1">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
                <h1 class="title-home">Discover the Light of the Quran</h1>
                <p>Illuminate your life with the teachings of Islam</p>
                <a href="{{ route('articles.articles') }}" class="btn btn-primary">Article</a>
            </div>
            <div class="col-md-6 order-1 order-md-2 text-center">
                <img src="{{ asset('home/css/img/Untitled.png') }}" class="img-fluid" alt="background">
            </div>
        </div>
        <br>
        <hr>
        @foreach ($sections as $section)
            <div class="row align-items-center mb-5">
                @if ($loop->index % 2 == 0)
                    <div class="col-md-6 fade-in-right">
                        <h2>{{ $section->title }}</h2>
                        <p>{{ strip_tags($section->description) }}</p>
                    </div>
                    <div class="col-md-6 text-center fade-in-left">
                        @if ($section->video_link)
                            @php
                                $videoId = '';
                                if (strpos($section->video_link, 'youtube.com') !== false) {
                                    parse_str(parse_url($section->video_link, PHP_URL_QUERY), $query);
                                    $videoId = $query['v'] ?? '';
                                } elseif (strpos($section->video_link, 'youtu.be') !== false) {
                                    $videoId = basename($section->video_link);
                                }
                            @endphp
                            @if ($videoId)
                                <iframe class="img-fluid" style="height: 470px; width: 500px"
                                    src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                    allowfullscreen></iframe>
                            @else
                                <p>No video available</p>
                            @endif
                        @elseif ($section->image)
                            <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}"
                                class="img-fluid" style="height: 470px;">
                        @endif
                    </div>
                @else
                    <div class="col-md-6 text-center fade-in-right">
                        @if ($section->video_link)
                            @php
                                $videoId = '';
                                if (strpos($section->video_link, 'youtube.com') !== false) {
                                    parse_str(parse_url($section->video_link, PHP_URL_QUERY), $query);
                                    $videoId = $query['v'] ?? '';
                                } elseif (strpos($section->video_link, 'youtu.be') !== false) {
                                    $videoId = basename($section->video_link);
                                }
                            @endphp
                            @if ($videoId)
                                <iframe class="img-fluid" style="height: 470px; width: 500px"
                                    src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                    allowfullscreen></iframe>
                            @else
                                <p>No video available</p>
                            @endif
                        @elseif ($section->image)
                            <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}"
                                class="img-fluid" style="height: 470px;">
                        @endif
                    </div>
                    <div class="col-md-6 fade-in-left">
                        <h2>{{ $section->title }}</h2>
                        <p>{{ strip_tags($section->description) }}</p>
                    </div>
                @endif
            </div>
        @endforeach


    </div>

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100, '...') }}
                        </p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop


@section('page-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script> <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <script>
        $(window).on('scroll', function() {
            $('.fade-in-right, .fade-in-left').each(function() {
                if ($(this).offset().top < $(window).scrollTop() + $(window).height() - 100) {
                    $(this).addClass('animated');
                }
            });
        });
    </script>
@endsection
