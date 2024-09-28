<div class="row">
    <div class="col-md-6 d-flex justify-content-start">
        <div class="text-left my-5 position-relative animate-from-left">
            <h2 class="d-inline-block position-relative z-index-1 bolder"
                style="font-size: 3rem; font-weight: 800; color:white;">Articles</h2>
            <p style="font-size:1.5rem;">
                <span>Discover enriching Arabic articles that inspire the mind and soul</span>
                <i style="width:2rem; height:2rem; color:#fff;" data-feather="star"></i>
            </p>
        </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-primary my-5 animate-from-right" style="width: 150px; height: 50px;">See
            All</a>
    </div>
</div>

<div class="row">
    @foreach ($articles as $article)
        <div class="col-md-4 mb-4 animate-from-bottom">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body article-info">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100, '...') }}
                    </p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read more..</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
