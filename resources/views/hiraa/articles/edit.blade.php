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
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Current Image</label><br>
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid"
                        style="max-width: 100%; height: auto;">
                @endif
                <br>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div class="file-drop-area" id="file-drop-area">
                    <span class="choose-file">Drag & Drop your file here or click to browse</span>
                    <input type="file" id="image" name="image" class="form-control-file" style="display: none;">
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control editor" required>{{ old('body', $article->body) }}</textarea>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('page-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: "#body",
            height: 500,
            menubar: true,
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
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });

        $(document).ready(function() {
            var $fileDropArea = $('#file-drop-area');
            var $fileInput = $('#image');

            $fileDropArea.on('dragover', function(event) {
                event.preventDefault();
                $fileDropArea.addClass('is-active');
            });

            $fileDropArea.on('dragleave', function() {
                $fileDropArea.removeClass('is-active');
            });

            $fileDropArea.on('drop', function(event) {
                event.preventDefault();
                $fileDropArea.removeClass('is-active');
                $fileInput.prop('files', event.originalEvent.dataTransfer.files);

                if ($fileInput[0].files.length > 0) {
                    var fileName = $fileInput[0].files[0].name;
                    $fileDropArea.find('.choose-file').text(fileName);
                }
            });

            $fileDropArea.on('click', function() {
                $fileInput.click();
            });

            $fileInput.on('change', function() {
                if ($fileInput[0].files.length > 0) {
                    var fileName = $fileInput[0].files[0].name;
                    $fileDropArea.find('.choose-file').text(fileName);
                }
            });
        });
    </script>
@endsection
