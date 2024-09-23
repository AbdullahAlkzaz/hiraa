@extends('layouts.app')
@section('title', 'About Us')

@section('content')
@if($aboutExists)
    <a href="{{ route('about.edit', $about->id) }}" class="btn floating-btn">
        <i class="fas fa-edit"></i> <!-- رمز التعديل -->
    </a>
@else
    <a href="{{ route('about.create') }}" class="btn floating-btn">
        <i class="fas fa-plus"></i> <!-- رمز الإنشاء -->
    </a>
@endif

@if($about)
    <div class="card mb-3">
        @if($embedUrl)
            <!-- عرض الفيديو بكامل العرض والارتفاع -->
            <div
                style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000;">
                <iframe src="{{ $embedUrl }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                    frameborder="0" allowfullscreen></iframe>
            </div>
        @elseif($about->image)
            <!-- عرض الصورة بكامل العرض والارتفاع -->
            <img src="{{ asset('storage/' . $about->image) }}" class="card-img-top"
                style="width: 100%; height: auto;">
        @endif

        <div class="card-body">
            <div class="card-text">{!! $about->description !!}</div>
            <p class="card-text"><small class="text-muted">Last updated
                    {{ $about->updated_at->diffForHumans() }}</small></p>
        </div>
    </div>


@else
    <p>No data available.</p>
@endif

@endsection
