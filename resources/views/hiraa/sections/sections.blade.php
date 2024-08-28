@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
    <style>
        .hidden-section {
            background-color: #f8d7da;
        }
    </style>


    <div class="container">
        <h1>Section</h1>
        <a href="{{ route('sections.create') }}" class="btn btn-primary">Add New Section</a>
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
                @foreach ($sections as $section)
                    <tr ondblclick="window.location.href='{{ route('sections.show', $section->id) }}'"
                        data-section-id="{{ $section->id }}" class="{{ $section->is_hidden ? 'hidden-section' : '' }}">
                        <td>{{ $section->title }}</td>
                        <td>
                            @if ($section->video_link)
                                @php
                                    $videoId = '';
                                    if (strpos($section->video_link, 'youtube.com') !== false) {
                                        parse_str(parse_url($section->video_link, PHP_URL_QUERY), $query);
                                        $videoId = $query['v'] ?? '';
                                    } elseif (strpos($section->video_link, 'youtu.be') !== false) {
                                        $videoId = basename($section->video_link);
                                    }
                                    $thumbnailUrl = $videoId
                                        ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"
                                        : '';
                                @endphp
                                @if ($thumbnailUrl)
                                    <img src="{{ $thumbnailUrl }}" alt="{{ $section->title }}" width="100">
                                @else
                                    <p>No thumbnail available</p>
                                @endif
                            @elseif ($section->image)
                                <img src="{{ asset('storage/' . $section->image) }}" alt="{{ $section->title }}"
                                    width="100">
                            @endif
                        </td>

                        <td>{{ strip_tags(substr($section->description, 0, 100)) }}...</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('sections.edit', $section->id) }}">
                                            <i data-feather="edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item"
                                            onclick="confirmDelete({{ $section->id }})">
                                            <i data-feather="delete"></i> Delete
                                        </a>
                                        <form id="delete-form-{{ $section->id }}"
                                            action="{{ route('sections.delete', $section->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="toggleVisibility({{ $section->id }}, '{{ route('sections.show', $section->id) }}')">
                                            <i data-feather="eye" id="icon-{{ $section->id }}"></i> <span
                                                id="view-text-{{ $section->id }}">View</span>
                                        </a>
                                    </li> --}}

                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="shareSection('{{ route('sections.show', $section->id) }}')">
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
        function confirmDelete(sectionId) {
            if (confirm('Are you sure you want to delete this section?')) {
                document.getElementById('delete-form-' + sectionId).submit();
            }
        }
    </script>

    <script>
        function confirmDelete(sectionId) {
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
                    document.getElementById('delete-form-' + sectionId).submit();
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

        function shareSection(url) {
            if (navigator.share) {
                navigator.share({
                        title: $(document).find("title").text(),
                        text: 'Check out this section!',
                        url: url,
                    })
                    .then(() => console.log('Section shared successfully!'))
                    .catch((error) => console.error('Error sharing section:', error));
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
