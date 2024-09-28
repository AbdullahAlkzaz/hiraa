@extends('layouts.app')
@section('title', 'Courses')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
    <a href="{{ route('courses.create') }}" class="btn floating-btn">
        <i class="fas fa-plus"></i>
    </a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <style>
        img {
            width: 100%;
            height: 100%;
            /* يمكن تعديل هذا لجعل ارتفاع الصورة تلقائي */
        }

        td {
            height: 70px;
        }
    </style>
    <style>
        .hidden-course {
            background-color: #f8d7da;
        }
    </style>


    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Cards</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr ondblclick="window.location.href='{{ route('courses.show', $course->id) }}'"
                    data-course-id="{{ $course->id }}" class="{{ $course->is_hidden ? 'hidden-course' : '' }}">
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{!! \Illuminate\Support\Str::limit(strip_tags($course->description), 150, '...') !!}</td>
                    <td>
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image">
                    </td>
                    <td>
                        @if (!empty($course->card))
                            @php
                                $cards = json_decode($course->card, true); // فك تشفير JSON إلى مصفوفة
                            @endphp
                            @foreach ($cards as $card)
                                <div>
                                    <strong>Title:</strong> {{ $card['title'] }}<br>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div>No cards available.</div>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ route('courses.edit', $course->id) }}">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="confirmDelete({{ $course->id }})">
                                        <i data-feather="delete"></i> Delete
                                    </a>
                                    <form id="delete-form-{{ $course->id }}"
                                        action="{{ route('courses.delete', $course->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        onclick="toggleVisibility({{ $course->id }}, '{{ route('courses.show', $course->id) }}')">
                                        <i data-feather="eye" id="icon-{{ $course->id }}"></i>
                                        <span id="view-text-{{ $course->id }}">View</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-primary share-link" href="#"
                                        data-url="{{ route('courses.show', $course->id) }}">
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
    </table>

@stop

@section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->

    <script>
        function confirmDelete(courseId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will delete the Course!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + courseId).submit();
                }
            });
        }

        function confirmDelete(courseId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will delete this Course!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + courseId).submit();
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

        function toggleVisibility(courseId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will change the Course's visibility!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, change visibility!",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('courses.toggleVisibility', ':id') }}'.replace(':id', courseId),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Change the icon and text based on visibility
                            if (response.is_hidden) {
                                $('#icon-' + courseId).attr('data-feather', 'eye-off');
                                $('#view-text-' + courseId).text('Hidden');
                                $('tr[data-course-id="' + courseId + '"]').addClass('hidden-course');
                            } else {
                                $('#icon-' + courseId).attr('data-feather', 'eye');
                                $('#view-text-' + courseId).text('View');
                                $('tr[data-course-id="' + courseId + '"]').removeClass('hidden-course');
                            }
                            feather.replace();

                            // Show success message
                            Swal.fire({
                                title: "Updated!",
                                text: "The course's visibility has been changed successfully.",
                                icon: 'success',
                                confirmButtonText: "Okay"
                            }).then(() => {
                                window.location.href = '{{ route('courses.courses') }}';
                            });
                        },
                        error: function(error) {
                            Swal.fire("Error!",
                                "An error occurred while trying to change the visibility.", 'error');
                        }
                    });
                }
            });

            // Customize the Swal buttons (optional)
            customizeSwalButtons();
        }

        function customizeSwalButtons() {
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
        $(document).ready(function() {
            $('.share-link').on('click', function(e) {
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
                        <a href="https://www.linkedin.com/shareCourse?mini=true&url=${encodeURIComponent(link)}" target="_blank" class="btn btn-primary">LinkedIn</a>
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
