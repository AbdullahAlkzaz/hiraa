@extends('layouts.app')
@section('title', 'Edit Article')

@section('content')

<div class="card mb-3">
    <!-- عرض الصورة الحالية في أعلى البطاقة -->
    <div class="card-img-container">
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
        @else
            <img src="..." class="card-img-top" alt="Default image">
        @endif
    </div>

    <div class="card-body">
        <h5 class="card-title">Edit Article</h5>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- عنوان المقالة -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- منطقة السحب والإفلات للصورة الجديدة -->
            <div class="col-12">
                <div class="form-group">
                    <label for="image">Upload New Image</label>
                    <div class="file-drop-area" id="file-drop-area">
                        <span class="choose-file">Drag & Drop your file here or click to browse</span>
                        <input type="file" id="image" name="image" class="form-control-file" style="display: none;">
                        <!-- عرض الصورة الجديدة المضافة -->
                        <img id="image-preview" class="img-fluid" style="display: none; max-width: 100%; height: auto;" alt="Image Preview">
                    </div>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- نص المقالة -->
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
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    $(document).ready(function () {
        var $fileDropArea = $('#file-drop-area');
        var $fileInput = $('#image');
        var $imagePreview = $('#image-preview');

        // عندما يتم سحب الملفات فوق منطقة السحب والإفلات
        $fileDropArea.on('dragover', function (event) {
            event.preventDefault();
            $fileDropArea.addClass('is-active');
        });

        // عندما يتم سحب الملفات خارج منطقة السحب والإفلات
        $fileDropArea.on('dragleave', function () {
            $fileDropArea.removeClass('is-active');
        });

        // عندما يتم إفلات الملفات في منطقة السحب والإفلات
        $fileDropArea.on('drop', function (event) {
            event.preventDefault();
            $fileDropArea.removeClass('is-active');
            $fileInput.prop('files', event.originalEvent.dataTransfer.files);

            if ($fileInput[0].files.length > 0) {
                var file = $fileInput[0].files[0];
                var fileName = file.name;
                $fileDropArea.find('.choose-file').text(fileName);

                var reader = new FileReader();
                reader.onload = function (e) {
                    $imagePreview.attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });

        // عندما يتم النقر على منطقة السحب والإفلات، افتح مستعرض الملفات
        $fileDropArea.on('click', function () {
            $fileInput.click();
        });

        // عندما يتم اختيار ملف من مستعرض الملفات
        $fileInput.on('change', function () {
            if ($fileInput[0].files.length > 0) {
                var file = $fileInput[0].files[0];
                var fileName = file.name;
                $fileDropArea.find('.choose-file').text(fileName);

                var reader = new FileReader();
                reader.onload = function (e) {
                    $imagePreview.attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
    });

</script>
@endsection
