@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')

    @include('hiraa.home.filles.hero')

    <!-- Include cards section -->
    @include('hiraa.home.filles.cards')

    <!-- Include sections with data -->
    @include('hiraa.home.filles.sections', ['sections' => $sections])

    <!-- Include about section -->
    @include('hiraa.home.filles.about', ['about' => $about])

    <!-- Include courses section -->
    @include('hiraa.home.filles.courses', ['courses' => $courses])


    <!-- Include articles section -->
    @include('hiraa.home.filles.articles', ['articles' => $articles])
@stop


@section('page-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var lastScrollTop = 0; // متغير لتخزين آخر قيمة تمرير

            function checkVisibility() {
                var windowHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var windowBottom = scrollTop + windowHeight; // أسفل النافذة
                var scrollDirection = (scrollTop > lastScrollTop) ? 'up' : 'down'; // تحديد اتجاه التمرير
                lastScrollTop = scrollTop; // تحديث قيمة آخر تمرير

                // تحقق من جميع العناصر التي تحتوي على الأنيميشن
                $('.fade-in-right, .fade-in-left, .fade-in-up, .fade-in-bottom').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight(); // أسفل العنصر

                    // تحقق مما إذا كان العنصر داخل مجال العرض
                    if (elementBottom > scrollTop && elementTop < windowBottom) {
                        $(this).removeClass('fade-out-down fade-out-up').addClass(
                            'animated'); // إظهار العنصر عند دخول مجال العرض
                    } else {
                        $(this).removeClass('animated'); // إزالة الأنيميشن عند خروج العنصر

                        // تحديد نوع الاختفاء بناءً على اتجاه التمرير
                        if (scrollDirection === 'down') {
                            $(this).addClass('fade-out-down');
                        } else {
                            $(this).addClass('fade-out-up');
                        }
                    }
                });
            }

            // قم بتشغيل الوظيفة عند التمرير وعند تحميل الصفحة
            $(window).on('scroll', checkVisibility);
            checkVisibility(); // تشغيل الوظيفة عند تحميل الصفحة
        });
    </script>
    <script>
        $(document).ready(function() {
            function checkVisibility() {
                var windowHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var windowBottom = scrollTop + windowHeight;

                // تحقق من جميع العناصر التي تحتوي على الأنيميشن
                $('.animate-from-left, .animate-from-right').each(function() {
                    var $element = $(this);
                    var elementTop = $element.offset().top;
                    var elementBottom = elementTop + $element.outerHeight();

                    // تحقق مما إذا كان العنصر داخل مجال العرض
                    if (elementBottom > scrollTop && elementTop < windowBottom) {
                        $element.addClass('animated'); // إظهار العنصر عند دخول مجال العرض
                    } else {
                        $element.removeClass('animated'); // إخفاء العنصر عند خروج مجال العرض
                    }
                });
            }

            // قم بتشغيل الوظيفة عند التمرير وعند تحميل الصفحة
            $(window).on('scroll', checkVisibility);
            $(window).on('resize', checkVisibility); // تشغيل الوظيفة عند تغيير حجم النافذة
            checkVisibility(); // تشغيل الوظيفة عند تحميل الصفحة
        });



        $(document).ready(function() {
            function checkVisibility() {
                var windowHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var windowBottom = scrollTop + windowHeight;

                // تحقق من جميع العناصر التي تحتوي على الأنيميشن
                $('.animate-from-left, .animate-from-right, .animate-from-bottom').each(function() {
                    var $element = $(this);
                    var elementTop = $element.offset().top;
                    var elementBottom = elementTop + $element.outerHeight();

                    // إذا كان العنصر داخل مجال العرض
                    if (elementBottom > scrollTop && elementTop < windowBottom) {
                        $element.addClass('animated'); // إظهار العنصر
                    } else {
                        $element.removeClass('animated'); // إخفاء العنصر عند الخروج من مجال العرض
                    }
                });
            }

            // تشغيل الوظيفة عند التمرير وعند تحميل الصفحة
            $(window).on('scroll', checkVisibility);
            $(window).on('resize', checkVisibility); // تشغيل الوظيفة عند تغيير حجم النافذة
            checkVisibility(); // تشغيل الوظيفة عند تحميل الصفحة
        });
    </script>

@endsection
