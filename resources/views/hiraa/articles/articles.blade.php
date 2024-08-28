@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
    <style>
        .hidden-article {
            background-color: #f8d7da;
        }
    </style>


    <div class="container">
        <h1>Articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Add New Article</a>
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
                @foreach ($articles as $article)
                    <tr ondblclick="window.location.href='{{ route('articles.show', $article->id) }}'"
                        data-article-id="{{ $article->id }}" class="{{ $article->is_hidden ? 'hidden-article' : '' }}">
                        <td>{{ $article->title }}</td>
                        <td>
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                    width="100">
                            @endif
                        </td>
                        <td>{{ strip_tags(substr($article->body, 0, 100)) }}...</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('articles.edit', $article->id) }}">
                                            <i data-feather="edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item"
                                            onclick="confirmDelete({{ $article->id }})">
                                            <i data-feather="delete"></i> Delete
                                        </a>
                                        <form id="delete-form-{{ $article->id }}"
                                            action="{{ route('articles.delete', $article->id) }}" method="POST"
                                            style="display: none;">
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
                                        <a class="dropdown-item" href="#"
                                            onclick="shareArticle('{{ route('articles.show', $article->id) }}')">
                                            <i data-feather="share-2"></i> Share
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        function confirmDelete(articleId) {
            Swal.fire({
                title: "{{ __('هل أنت متأكد؟') }}",
                text: "{{ __('ستقوم بحذف المقالة!') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('نعم، احذفها!') }}",
                cancelButtonText: "{{ __('إلغاء') }}",
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
                title: "{{ __('هل أنت متأكد؟') }}",
                text: "{{ __('ستقوم بتغيير حالة المقال!') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('نعم، غيّر الحالة!') }}",
                cancelButtonText: "{{ __('إلغاء') }}",
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('articles.toggleVisibility', ':id') }}'.replace(':id', articleId),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Change the icon and text based on visibility
                            if (response.is_hidden) {
                                $('#icon-' + articleId).attr('data-feather', 'eye-off');
                                $('#view-text-' + articleId).text('{{ __('Hidden') }}');
                                $('tr[data-article-id="' + articleId + '"]').addClass('hidden-article');
                            } else {
                                $('#icon-' + articleId).attr('data-feather', 'eye');
                                $('#view-text-' + articleId).text('{{ __('View') }}');
                                $('tr[data-article-id="' + articleId + '"]').removeClass(
                                    'hidden-article');
                            }
                            feather.replace();

                            // Show success message and redirect to articles page
                            Swal.fire({
                                title: "{{ __('تم التحديث!') }}",
                                text: "{{ __('تم تغيير حالة المقال بنجاح.') }}",
                                icon: 'success',
                                confirmButtonText: "{{ __('حسنًا') }}"
                            }).then(() => {
                                window.location.href = '{{ route('articles.articles') }}';
                            });
                        },
                        error: function(error) {
                            Swal.fire("{{ __('خطأ!') }}",
                                "{{ __('حدث خطأ أثناء محاولة تغيير الحالة.') }}", 'error');
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

        function shareArticle(url) {
            // Check if the browser supports the Web Share API
            if (navigator.share) {
                navigator.share({
                        title: $(document).find("title").text(),
                        text: 'Check out this article!',
                        url: url,
                    })
                    .then(() => console.log('Article shared successfully!'))
                    .catch((error) => console.error('Error sharing article:', error));
            } else {
                // Fallback: Copy the URL to clipboard
                copyToClipboard(url);
                alert('The link has been copied to your clipboard.');
            }
        }

        function copyToClipboard(text) {
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(text).select();
            document.execCommand('copy');
            tempInput.remove();
        }
    </script>
@endsection
