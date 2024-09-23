@extends('layouts.app')
@section('title', 'Edit Section')

@section('content')

<div class="card mb-3">
    <div class="row g-0">
        <!-- المساحة لعرض الصورة أو الفيديو الحالي -->
        <div class="col-md-4">
            <div id="current-media-container" style="text-align: center; padding: 10px;">
            @if ($section->media_type == 'image' && $section->image)                    <img src="{{ asset('storage/' . $section->image) }}"
                        alt="{{ $section->title }}" class="img-fluid rounded-start" id="current-media"
                        style="max-width: 100%; height: auto;">
                        @elseif ($section->media_type == 'video' && $section->video_link)                    <video src="{{ $section->video_link }}" controls class="img-fluid rounded-start"
                        id="current-media" style="max-width: 100%; height: auto;">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <form action="{{ route('sections.update', $section->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $section->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Media Type</label>
                        <div>
                            <label>
                                <input type="radio" name="media_type" value="image"
                                    {{ $section->media_type == 'image' ? 'checked' : '' }}>
                                Image
                            </label>
                            <label>
                                <input type="radio" name="media_type" value="video"
                                    {{ $section->media_type == 'video' ? 'checked' : '' }}>
                                Video
                            </label>
                        </div>
                    </div>

                    <!-- حقل الصورة -->
                    <div class="form-group" id="image-input"
                        style="{{ $section->media_type == 'video' ? 'display: none;' : '' }}">
                        <label for="image">Image</label>
                        <div class="file-drop-area" id="file-drop-area">
                            <span class="choose-file">Drag & Drop your file here or click to browse</span>
                            <input type="file" id="image" name="image" class="form-control-file" style="display: none;">
                            <img id="image-preview" class="img-fluid rounded-start"
                                style="display: none; margin-top: 10px;" alt="Image Preview">
                        </div>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- حقل الفيديو -->
                    <div class="form-group" id="video-input"
                        style="{{ $section->media_type == 'image' ? 'display: none;' : '' }}">
                        <label for="video_link">Video Link</label>
                        <input type="url" id="video_link" name="video_link" class="form-control"
                            value="{{ old('video_link', $section->video_link) }}">
                        <div id="video-preview" style="margin-top: 10px;"></div>
                        @error('video_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control editor"
                            required>{{ old('description', $section->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('page-script')
<!-- BEGIN: Page Vendor JS -->
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<!-- END: Page Vendor JS -->
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: "#description",
        height: 500,
        menubar: true, // عرض شريط القوائم الكامل
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount",
            "textcolor",
            "fontselect",
            "emoticons",
            "fullscreen",
            "hr",
            "imagetools",
            "importcss",
            "nonbreaking",
            "pagebreak",
            "save",
            "tabfocus",
            "template",
            "visualblocks",
            "visualchars",
            "wordcount",
            "advtable",
            "quickbars",
            "contextmenu",
            "autosave"
        ],
        toolbar: "undo redo | styleselect | bold italic underline strikethrough | " +
            "forecolor backcolor | alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | removeformat | fontselect fontsizeselect | " +
            "link image media | print preview fullscreen | code help",
        toolbar_mode: 'floating',
        quickbars_insert_toolbar: 'quicktable image media codesample',
        quickbars_selection_toolbar: 'bold italic underline strikethrough | h2 h3 blockquote | ' +
            'alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | link',
        content_style: "description { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

</script>

<script>
    $(document).ready(function () {
        // عناصر الصفحة
        var $fileDropArea = $('#file-drop-area');
        var $fileInput = $('#image');
        var $imagePreview = $('#image-preview');
        var $videoInput = $('#video-input');
        var $imageInput = $('#image-input');
        var $currentMedia = $('#current-media');

        // عندما يتم تغيير نوع الوسائط
        $('input[name="media_type"]').on('change', function () {
            var selectedType = this.value;
            if (selectedType === 'image') {
                $imageInput.show();
                $videoInput.hide();
                $imagePreview.show();
                $videoPreview.hide();
                $currentMedia.show();
            } else if (selectedType === 'video') {
                $imageInput.hide();
                $videoInput.show();
                $imagePreview.hide();
                $videoPreview.show();
                $currentMedia.show();
            }
        });

        // عند اختيار ملف من مستعرض الملفات أو سحبه
        $fileDropArea.on('dragover', function (event) {
            event.preventDefault();
            $(this).addClass('is-active');
        }).on('dragleave', function () {
            $(this).removeClass('is-active');
        }).on('drop', function (event) {
            event.preventDefault();
            $(this).removeClass('is-active');
            $fileInput.prop('files', event.originalEvent.dataTransfer.files);
            handleFile($fileInput[0].files[0]);
        });

        $fileInput.on('change', function () {
            if ($fileInput[0].files.length > 0) {
                handleFile($fileInput[0].files[0]);
            }
        });

        function handleFile(file) {
            var fileType = file.type;
            var reader = new FileReader();

            if (fileType.startsWith('image/')) {
                reader.onload = function (e) {
                    $imagePreview.attr('src', e.target.result).show();
                    $currentMedia.hide();
                }
                reader.readAsDataURL(file);
            } else if (fileType.startsWith('video/')) {
                reader.onload = function (e) {
                    $videoPreview.html('<video src="' + e.target.result +
                        '" controls style="max-width: 100%; height: auto;"></video>').show();
                    $currentMedia.hide();
                }
                reader.readAsDataURL(file);
            }
        }

        // تعيين العرض الأولي عند تحميل الصفحة
        if ($('input[name="media_type"]:checked').val() === 'image') {
            $imagePreview.show();
            $videoPreview.hide();
        } else if ($('input[name="media_type"]:checked').val() === 'video') {
            $imagePreview.hide();
            $videoPreview.show();
        }
    });



    $(document).ready(function () {
        const $imageInput = $('#image-input');
        const $videoInput = $('#video-input');

        // إظهار أو إخفاء الحقول بناءً على النوع المختار
        $('input[name="media_type"]').change(function () {
            if ($(this).val() === 'image') {
                $imageInput.show();
                $videoInput.hide();
            } else if ($(this).val() === 'video') {
                $imageInput.hide();
                $videoInput.show();
            }
        });

        // تأكد من إظهار الحقل الصحيح عند تحميل الصفحة بناءً على القيمة الحالية
        if ($('input[name="media_type"]:checked').val() === 'image') {
            $imageInput.show();
            $videoInput.hide();
        } else {
            $imageInput.hide();
            $videoInput.show();
        }
    });

</script>
@endsection
