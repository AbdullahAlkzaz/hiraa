@extends('layouts.app')
@section('title', 'Create Course')

@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')

<div class="container mt-5">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <!-- Course Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Course Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Course Image</label>
                        <div id="image-upload-area" class="border p-3 text-center" style="cursor: pointer;">
                            <p>Click to upload an image or drag it here</p>
                            <input type="file" id="image" name="image" accept="image/*" style="display: none;" required>
                            <img id="image-preview" src="#" alt="Image Preview"
                                style="max-width: 100%; display: none;" />
                        </div>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Course Body -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Course description</label>
                        <textarea id="description" name="description" class="form-control editor"
                            required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Cards Container -->
            <div id="cardsContainer">
                <!-- Card 1 -->
                <div class="card p-3 mb-3" id="card_0">
                    <div class="mb-3">
                        <label for="card_title_0" class="form-label">Card Title</label>
                        <input type="text" class="form-control" id="card_title_0" name="cards[0][title]"
                            value="{{ old('cards.0.title') }}" required>
                        @error('cards.0.title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="card_body_0" class="form-label">Card Body</label>
                        <textarea id="card_body_0" name="cards[0][body]" class="form-control editor"
                            required>{{ old('cards.0.body') }}</textarea>
                        @error('cards.0.body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="card_button_name_0" class="form-label">Card Button Name</label>
                        <input type="text" class="form-control" id="card_button_name_0" name="cards[0][button_name]"
                            value="{{ old('cards.0.button_name') }}" required>
                        @error('cards.0.button_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Button to Add More Cards -->
            <button type="button" id="addCardButton" class="btn btn-secondary mb-3">Add Another Card</button>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save Course</button>
        </div>
    </form>
</div>

@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

<script>
    function initializeTinyMCE(selector) {
        tinymce.init({
            selector: selector, // لاحظ هنا التحديد الصحيح للمحدد (selector)
            height: 500,
            menubar: true,
            plugins: 'lists link image code',
            toolbar: "undo redo | styleselect | bold italic underline strikethrough | " +
                "forecolor backcolor | alignleft aligncenter alignright alignjustify | " +
                "bullist numlist outdent indent | removeformat | fontselect fontsizeselect | " +
                "link image media | print preview fullscreen | code help",
            toolbar_mode: 'floating',
            quickbars_insert_toolbar: 'quicktable image media codesample',
            quickbars_selection_toolbar: 'bold italic underline strikethrough | h2 h3 blockquote | ' +
                'alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | link',
            content_style: "description { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
            license_key: 'gpl', // Add this line
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    }

    // تهيئة المحرر للنصوص الأساسية
    initializeTinyMCE('#description');
    initializeTinyMCE('#card_body_0');

    // Image Upload and Preview Functionality
    document.getElementById('image-upload-area').addEventListener('click', function () {
        document.getElementById('image').click();
    });

    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Initialize Add Card Functionality
    let cardIndex = 1;
    document.getElementById('addCardButton').addEventListener('click', function () {
        const cardsContainer = document.getElementById('cardsContainer');
        const newCard = `
            <div class="card p-3 mb-3" id="card_${cardIndex}">
                <div class="mb-3">
                    <label for="card_title_${cardIndex}" class="form-label">Card Title</label>
                    <input type="text" class="form-control" id="card_title_${cardIndex}" name="cards[${cardIndex}][title]" required>
                </div>
                <div class="mb-3">
                    <label for="card_body_${cardIndex}" class="form-label">Card Body</label>
                    <textarea class="form-control editor" id="card_body_${cardIndex}" name="cards[${cardIndex}][body]" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="card_button_name_${cardIndex}" class="form-label">Card Button Name</label>
                    <input type="text" class="form-control" id="card_button_name_${cardIndex}" name="cards[${cardIndex}][button_name]" required>
                </div>
                <button type="button" class="btn btn-danger deleteCardButton" data-card-index="${cardIndex}">Delete Card</button>
            </div>`;
        
        cardsContainer.insertAdjacentHTML('beforeend', newCard);

        // إزالة أي تهيئة سابقة للمحرر ثم تهيئة المحرر للنص المضاف ديناميكيًا
        tinymce.EditorManager.execCommand('mceRemoveEditor', true, `card_body_${cardIndex}`);
        initializeTinyMCE(`#card_body_${cardIndex}`); // تهيئة TinyMCE للنصوص المضافة
        cardIndex++;
    });

    // Delete Card Functionality
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('deleteCardButton')) {
            const cardIndex = event.target.getAttribute('data-card-index');
            const card = document.getElementById(`card_${cardIndex}`);
            tinymce.EditorManager.execCommand('mceRemoveEditor', true, `card_body_${cardIndex}`); // تأكد من إزالة المحرر أولًا
            card.remove();
        }
    });
</script>


@endsection
