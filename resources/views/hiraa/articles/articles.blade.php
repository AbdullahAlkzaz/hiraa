@extends('layouts.app')
@section('title', 'Articles')

@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
<style>
    .hidden-article {
        background-color: #f8d7da;
    }

</style>


<div class="container">
    <a href="{{ route('articles.create') }}" class="btn floating-btn">
        <i class="fas fa-plus"></i>
    </a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr ondblclick="window.location.href='{{ route('articles.show', $article->id) }}'"
                    data-article-id="{{ $article->id }}"
                    class="{{ $article->is_hidden ? 'hidden-article' : '' }}">
                    <td>{{ $article->title }}</td>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}"
                                alt="{{ $article->title }}" width="100">
                        @endif
                    </td>
                    <td>{{ strip_tags(substr($article->body, 0, 100)) }}...</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">

                                <!-- Unicode for vertical ellipsis -->
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('articles.edit', $article->id) }}">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="confirmDelete({{ $article->id }})">
                                        <i data-feather="delete"></i> Delete
                                    </a>
                                    <form id="delete-form-{{ $article->id }}"
                                        action="{{ route('articles.delete', $article->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        onclick="toggleVisibility({{ $article->id }}, '{{ route('articles.show', $article->id) }}')">
                                        <i data-feather="eye" id="icon-{{ $article->id }}"></i> <span
                                            id="view-text-{{ $article->id }}">View</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-primary share-link" href="#"
                                        data-url="{{ route('articles.show', $article->id) }}">
                                        <i data-feather="share-2"></i>
                                        <span>Share</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </td>
            </tr>
        </tfoot>
    </table>
    <br><br>



</div>
@stop

    @section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        function confirmDelete(articleId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will delete this article!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + articleId).submit();
                }
            });

            $('.swal2-actions').css({
                'display': 'flex',
                'justify-content': 'space-between',
                'width': '100%'
            });

            $('.swal2-confirm').css({
                'background-color': '#3085d6',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto',
                'margin-right': '10px'
            });

            $('.swal2-cancel').css({
                'background-color': '#d33',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto',
                'margin-left': '10px'
            });
        }

        function toggleVisibility(articleId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will change the article's visibility!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, change visibility!",
                cancelButtonText: "Cancel",
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('articles.toggleVisibility', ':id') }}'
                            .replace(':id', articleId),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            // Change the icon and text based on visibility
                            if (response.is_hidden) {
                                $('#icon-' + articleId).attr('data-feather', 'eye-off');
                                $('#view-text-' + articleId).text('Hidden');
                                $('tr[data-article-id="' + articleId + '"]').addClass(
                                    'hidden-article');
                            } else {
                                $('#icon-' + articleId).attr('data-feather', 'eye');
                                $('#view-text-' + articleId).text('View');
                                $('tr[data-article-id="' + articleId + '"]').removeClass(
                                    'hidden-article');
                            }
                            feather.replace();

                            // Show success message and redirect to articles page
                            Swal.fire({
                                title: "Updated!",
                                text: "The article's visibility has been changed successfully.",
                                icon: 'success',
                                confirmButtonText: "Okay"
                            }).then(() => {
                                window.location.href =
                                    '{{ route('articles.articles') }}';
                            });
                        },
                        error: function (error) {
                            Swal.fire("Error!",
                                "An error occurred while trying to change the visibility.",
                                'error');
                        }
                    });
                }
            });

            // Customize the Swal buttons
            $('.swal2-actions').css({
                'display': 'flex',
                'justify-content': 'space-between',
                'width': '100%'
            });

            $('.swal2-confirm').css({
                'background-color': '#3085d6',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto',
                'margin-right': '10px'
            });

            $('.swal2-cancel').css({
                'background-color': '#d33',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto',
                'margin-left': '10px'
            });
        }

        function copyToClipboard(text) {
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(text).select();
            document.execCommand('copy');
            tempInput.remove();
        }

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
