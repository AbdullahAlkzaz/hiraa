@extends('layouts.appHiraa')
@section('title', 'About Us')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush


@section('content')
    {{-- <br><br> --}}

    {{-- <h2 class="content-header-page">@yield('title')</h2> --}}
    @if ($about)

        <div class="card mb-3">

            @if ($embedUrl)
                <!-- عرض الفيديو بكامل العرض والارتفاع -->
                <div
                    style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000;">
                    <iframe src="{{ $embedUrl }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            @elseif($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" class="card-img-top"x>
            @endif

            <div class="card-body">
                <h5 class="card-title">About</h5>
                <div class="card-text">{!! $about->description !!}</div>
            </div>
        </div>
    @else
        <p>No data available.</p>
    @endif
@stop

@section('page-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
