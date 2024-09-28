{{-- <div class="about-section">
    <div class="card tilted-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 d-flex justify-content-start ">
                    <h2 class="d-inline-block position-relative z-index-1 bolder text-left animate-from-left"
                        style="font-size: 3rem; font-weight: 800; color:white;">
                        About Us</h2>
                </div>
                @if ($about)
                    <div class="col-md-4 d-flex justify-content-end animate-from-right">

                        <a href="{{ route('about.show', $about->id) }}">Show About</a>


                    </div>
                    <p class="card-text">
                        {!! Str::limit($about->description, 150) !!}
                    </p>
                @else
                    <p>About information is not available.</p>
                @endif
            </div>
        </div>
    </div>
</div> --}}
<div class="card bg-light text-center text-dark my-4 w-100" style="border-radius: 0;">

    <!-- النصوص فوق الصورة -->
    <div class="card-body">
        @if ($about)
            <h2 class="card-title">About Us</h2>
            <p class="card-text">
                {!! Str::limit($about->description, 600) !!}
            </p>
            {{-- <p class="card-text"><small>Last updated {{ $about->updated_at->diffForHumans() }}</small></p> --}}
            <a href="{{ route('about.show', $about->id) }}" class="btn btn-primary">Show About</a>
        @else
            <p>About information is not available.</p>
        @endif
    </div>
</div>
