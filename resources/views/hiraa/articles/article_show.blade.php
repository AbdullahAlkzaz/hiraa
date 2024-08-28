@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title ">{{ $article->title }}</h1>
                <!-- صورة المقال -->
                <div class="article-image mb-3">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                            class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
                    @endif
                </div>
                <!-- محتوى المقال -->
                <div class="article-content">
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <p class="text-muted"><i class="fa fa-calendar"></i> {{ $article->created_at->format('F j, Y') }}</p>
                    <div class="article-body">
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
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
                buttonsStyling: false // تعطيل التنسيق الافتراضي
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + articleId).submit();
                }
            });

            // تخصيص ألوان وتصميم الأزرار باستخدام jQuery
            $('.swal2-actions').css({
                'display': 'flex',
                'justify-content': 'space-between', // توزيع الأزرار على الجانبين
                'width': '100%' // توسيع المساحة لتأخذ كامل العرض
            });

            $('.swal2-confirm').css({
                'background-color': '#3085d6',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto', // تعيين مساحة كل زر
                'margin-right': '10px' // إضافة مسافة بين الأزرار
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
    </script>
@endsection
