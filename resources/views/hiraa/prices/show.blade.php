@extends('layouts.appHiraa')
@section('title', 'Prices')
@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
<br><br>

<div class="container">
<h2 class="content-header-page">@yield('title')</h2>

    <div class="text-center my-4">
        <a href="{{ route('prices.show') }}" class="filter-btn {{ !request('time') ? 'active-filter' : '' }}" data-time="">All</a>
        <a href="{{ route('prices.show', ['time' => 30]) }}" class="filter-btn {{ request('time') == 30 ? 'active-filter' : '' }}" data-time="30">30 MINS</a>
        <a href="{{ route('prices.show', ['time' => 45]) }}" class="filter-btn {{ request('time') == 45 ? 'active-filter' : '' }}" data-time="45">45 MINS</a>
        <a href="{{ route('prices.show', ['time' => 60]) }}" class="filter-btn {{ request('time') == 60 ? 'active-filter' : '' }}" data-time="60">60 MINS</a>
    </div>

    <div id="prices-container" class="row">
        @include('hiraa.prices.partials.prices', ['prices' => $prices])
    </div>
</div>

@endsection
@section('page-script')

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<!-- END: Page Vendor JS-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // تعيين النمط النشط عند تحميل الصفحة
        var activeTime = '{{ request('time') }}';
        if (activeTime) {
            $('.filter-btn').each(function() {
                if ($(this).data('time') == activeTime) {
                    $(this).addClass('active-filter');
                }
            });
        } else {
            $('.filter-btn[data-time=""]').addClass('active-filter');
        }

        $('.filter-btn').click(function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            $.get(url, function(data) {
                $('#prices-container').html(data);
                $('.filter-btn').removeClass('active-filter');
                $(e.target).addClass('active-filter');
            });
        });
    });
</script>


@endsection
