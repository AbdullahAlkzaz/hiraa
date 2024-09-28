@foreach ($sections as $section)
    <div class="row align-items-center bg-dark text-light section">
        @if ($loop->index % 2 == 0)
            <div class="col-md-6 text-left animate-from-left">
                <h2 class="display-4">{{ $section->title }}</h2>
                <p>{{ strip_tags($section->description) }}</p>
            </div>
            <div class="col-md-6 text-center animate-from-right">
                @if ($section->videoId)
                    <iframe class="img-fluid rounded" style="height: 470px; width: 100%;"
                        src="https://www.youtube.com/embed/{{ $section->videoId }}" frameborder="0"
                        allowfullscreen></iframe>
                @elseif($section->image)
                    <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}"
                        class="img-fluid rounded" style="height: 470px; width: 100%;">
                @else
                    <p>No media available</p>
                @endif
            </div>
        @else
            <div class="col-md-6 text-center animate-from-left">
                @if ($section->videoId)
                    <iframe class="img-fluid rounded" style="height: 470px; width: 100%;"
                        src="https://www.youtube.com/embed/{{ $section->videoId }}" frameborder="0"
                        allowfullscreen></iframe>
                @elseif($section->image)
                    <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}"
                        class="img-fluid rounded" style="height: 470px; width: 100%;">
                @else
                    <p>No media available</p>
                @endif
            </div>
            <div class="col-md-6 text-right animate-from-right">
                <h2 class="display-4">{{ $section->title }}</h2>
                <p>{{ strip_tags($section->description) }}</p>
            </div>
        @endif
    </div>
@endforeach
