@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
<br><br>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title">{{ $article->title }}</h1>
            <a class="btn btn-primary share-link" href="#"
                data-url="{{ route('articles.show', $article->id) }}">
                <i data-feather="share-2"></i>
                <span>Share</span>
            </a>

        </div>
        <div class="article-image mb-3">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->title }}" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
            @endif
        </div>
        <!-- محتوى المقال -->
        <div class="article-content">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="text-muted"><i class="fa fa-calendar"></i>
                {{ $article->created_at->format('F j, Y') }}</p>
            <div class="article-body">
                {!! $article->body !!}
            </div>
        </div>
    </div>
</div>

@stop

    @section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->

    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace(); // Initialize Feather Icons

    </script>

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
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(link)}" target="_blank" class="btn btn-primary">LinkedIn</a>
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
