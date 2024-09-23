@extends('layouts.app')
@section('title', 'New About')

@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')

<div class="card mb-3">
    <div class="row g-0">
        <div class="card-body">
            <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Media Type</label>
                    <div>
                        <label>
                            <input type="radio" name="media_type" value="image" checked> Image
                        </label>
                        <label>
                            <input type="radio" name="media_type" value="video"> Video
                        </label>
                    </div>
                </div>

                <div class="form-group" id="image-input">
                    <label for="image" class="form-label">Image</label>
                    <div class="file-drop-area" id="file-drop-area">
                        <span class="choose-file">Drag & Drop your file here or click to browse</span>
                        <input type="file" id="image" name="image" class="form-control-file" style="display: none;">
                    </div>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- حقل الفيديو -->
                <div class="form-group" id="video-input" style="display: none;">
                    <label for="video_link" class="form-label">Video Link</label>
                    <input type="url" id="video_link" name="video_link" class="form-control">
                    @error('video_link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- وصف -->
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description"
                        class="form-control editor">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر الإرسال -->
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>


@stop

    @section('page-script')
    <!-- BEGIN: Page Vendor JS -->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS -->
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>


    <script>
        $(document).ready(function () {
            $('input[name="media_type"]').change(function () {
                if ($(this).val() === 'image') {
                    $('#image-input').show();
                    $('#video-input').hide();
                } else {
                    $('#image-input').hide();
                    $('#video-input').show();
                }
            });

            $('#video_link').on('input', function () {
                var link = $(this).val();
                var embedCode = '';

                if (link.includes('youtube.com') || link.includes('youtu.be')) {
                    var videoId = link.split('v=')[1] || link.split('youtu.be/')[1];
                    embedCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' +
                        videoId +
                        '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                } else if (link.includes('facebook.com')) {
                    embedCode = '<iframe src="https://www.facebook.com/plugins/video.php?href=' +
                        encodeURIComponent(link) +
                        '&show_text=false&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>';
                }
                // Add more conditions for other platforms if needed

                $('#video-preview').html(embedCode);
            });
        });

    </script>

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
            var $fileDropArea = $('#file-drop-area');
            var $fileInput = $('#image');
            var $imagePreview = $('#image-preview');
            var $videoPreview = $('#video-preview');
            var $videoSource = $('#video-source');
            var $chooseFileText = $('.choose-file');

            // عند سحب الملفات فوق منطقة السحب والإفلات
            $fileDropArea.on('dragover', function (event) {
                event.preventDefault();
                $fileDropArea.addClass('is-active');
            });

            // عند سحب الملفات خارج منطقة السحب والإفلات
            $fileDropArea.on('dragleave', function () {
                $fileDropArea.removeClass('is-active');
            });

            // عند إفلات الملفات في منطقة السحب والإفلات
            $fileDropArea.on('drop', function (event) {
                event.preventDefault();
                $fileDropArea.removeClass('is-active');
                $fileInput.prop('files', event.originalEvent.dataTransfer.files);

                handleFile($fileInput[0].files[0]);
            });

            // عند اختيار ملف من مستعرض الملفات
            $fileInput.on('change', function () {
                if ($fileInput[0].files.length > 0) {
                    handleFile($fileInput[0].files[0]);
                }
            });

            // عند النقر على منطقة السحب والإفلات أو النص، فتح مستعرض الملفات
            $fileDropArea.on('click', function () {
                $fileInput.click();
            });

            $chooseFileText.on('click', function () {
                $fileInput.click();
            });

            // عند تغيير نوع الوسائط
            $('input[name="media_type"]').on('change', function () {
                var selectedType = this.value;
                if (selectedType === 'image') {
                    $('#image-input').show();
                    $('#video-input').hide();
                    $videoPreview.hide();
                    $imagePreview.show();
                } else if (selectedType === 'video') {
                    $('#image-input').hide();
                    $('#video-input').show();
                    $imagePreview.hide();
                    $videoPreview.show();
                }
            });

            function handleFile(file) {
                var fileType = file.type;
                var reader = new FileReader();

                if (fileType.startsWith('image/')) {
                    $imagePreview.show();
                    $videoPreview.hide();
                    reader.onload = function (e) {
                        $imagePreview.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                } else if (fileType.startsWith('video/')) {
                    $videoPreview.show();
                    $imagePreview.hide();
                    reader.onload = function (e) {
                        $videoSource.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        });

    </script>

    @endsection
