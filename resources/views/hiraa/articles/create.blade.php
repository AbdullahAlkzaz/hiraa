@extends('layouts.app')
@section('title', 'New Articles')

@section('content')
<div class="container">
    <div class="card mb-3">
        <!-- بدء الفورم -->
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- صورة المعاينة هنا -->
            <div id="file-drop-area" class="file-drop-area">
                <span class="choose-file">Drag & Drop your file here or click to browse</span>
                <input type="file" id="image" name="image" style="display: none;">
                <img id="image-preview" style="display: none;" />
            </div>

            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="card-body">
                <!-- حقل العنوان -->
                <div class="form-group">
                    <h5 class="card-title">
                        <label for="title">Title</label>
                        <input type="text" id="title" style="height:3rem; width: 100%;" name="title"
                            class="form-control" value="{{ old('title') }}" required>
                    </h5>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- حقل النص (Body) -->
                <div class="form-group">
                    <label for="body">Body</label>
                    <p class="card-text">
                        <textarea id="body" name="body"
                            class="form-control editor">{{ old('body') }}</textarea>
                    </p>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر الحفظ -->
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <!-- نهاية الفورم -->
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

</script>

<script>
    $(document).ready(function () {
        var $fileDropArea = $('#file-drop-area');
        var $fileInput = $('#image');
        var $imagePreview = $('#image-preview');
        var $chooseFileText = $('.choose-file'); // الوصول إلى الـ span

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

            if ($fileInput[0].files.length > 0) {
                var file = $fileInput[0].files[0];
                var fileName = file.name;
                $chooseFileText.text(fileName);

                var reader = new FileReader();
                reader.onload = function (e) {
                    $imagePreview.attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });

        // عند النقر على منطقة السحب والإفلات أو النص "choose-file"
        $fileDropArea.on('click', function (event) {
            event.preventDefault(); // منع التصرف الافتراضي
            $fileInput.click();
        });

        // عند النقر على النص "choose-file"
        $chooseFileText.on('click', function (event) {
            event.preventDefault(); // منع التصرف الافتراضي
            $fileInput.click();
        });

        // عند اختيار ملف من مستعرض الملفات
        $fileInput.on('change', function () {
            if ($fileInput[0].files.length > 0) {
                var file = $fileInput[0].files[0];
                var fileName = file.name;
                $chooseFileText.text(fileName);

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
