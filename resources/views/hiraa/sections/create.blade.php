@extends('layouts.appHiraa')

@section('content')
    <style>
        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            /* تأكد من أن النص يكون في الوسط */
            width: 100%;
            max-width: 100%;
            padding: 25px;
            border: 2px dashed #007bff;
            border-radius: 5px;
            background-color: #f8f9fa;
            cursor: pointer;
            text-align: center;
        }

        .file-drop-area.is-active {
            background-color: #e9ecef;
        }

        .file-drop-area input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            /* تأكد من أن الإنبوت غير مرئي ولكنه يغطي كامل المنطقة */
            cursor: pointer;
            z-index: 10;
            /* تأكد من أن الإنبوت فوق جميع العناصر الأخرى */
        }

        .file-drop-area .choose-file {
            font-size: 16px;
            color: #007bff;
            z-index: 1;
            /* اجعل النص فوق الخلفية */
        }
    </style>

    <div class="container">
        <h1>Create Article</h1>
        <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="media_type">Media Type</label>
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
                <label for="image">Image</label>
                <div class="file-drop-area" id="file-drop-area">
                    <span class="choose-file">Drag & Drop your file here or click to browse</span>
                    <input type="file" id="image" name="image" class="form-control-file" style="display: none;">
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" id="video-input" style="display: none;">
                <label for="video_link">Video Link</label>
                <input type="url" id="video_link" name="video_link" class="form-control">
                <div id="video-preview" style="margin-top: 10px;"></div>
                @error('video_link')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <textarea id="description" name="description" class="form-control editor">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

@section('page-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('input[name="media_type"]').change(function() {
                if ($(this).val() === 'image') {
                    $('#image-input').show();
                    $('#video-input').hide();
                } else {
                    $('#image-input').hide();
                    $('#video-input').show();
                }
            });

            $('#video_link').on('input', function() {
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
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var $fileDropArea = $('#file-drop-area');
            var $fileInput = $('#image');

            // عندما يتم سحب الملفات فوق منطقة السحب والإفلات
            $fileDropArea.on('dragover', function(event) {
                event.preventDefault();
                $fileDropArea.addClass('is-active');
            });

            // عندما يتم سحب الملفات خارج منطقة السحب والإفلات
            $fileDropArea.on('dragleave', function() {
                $fileDropArea.removeClass('is-active');
            });

            // عندما يتم إفلات الملفات في منطقة السحب والإفلات
            $fileDropArea.on('drop', function(event) {
                event.preventDefault();
                $fileDropArea.removeClass('is-active');
                $fileInput.prop('files', event.originalEvent.dataTransfer.files);

                // عرض اسم الملف الذي تم رفعه
                if ($fileInput[0].files.length > 0) {
                    var fileName = $fileInput[0].files[0].name;
                    $fileDropArea.find('.choose-file').text(fileName);
                }
            });

            // عندما يتم النقر على منطقة السحب والإفلات، افتح مستعرض الملفات
            $fileDropArea.on('click', function() {
                $fileInput.click();
            });

            // عندما يتم اختيار ملف من مستعرض الملفات
            $fileInput.on('change', function() {
                if ($fileInput[0].files.length > 0) {
                    var fileName = $fileInput[0].files[0].name;
                    $fileDropArea.find('.choose-file').text(fileName);
                }
            });
        });
    </script>
@endsection
