@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet"
        href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
<div class="container">
    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-6 order-2 order-md-1 d-flex flex-column text-md-left">
                    <h1 class="title-home">Discover the Light of the Quran</h1>
                    <p>Illuminate your life with the teachings of Islam</p>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('articles.articles') }}"
                                class="btn btn-primary">Article</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('prices.show') }}" class="btn btn-primary">Prices</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2 d-flex justify-content-center">
                    <img src="{{ asset('home/css/img/Untitled (5).png') }}" class="img-fluid"
                        alt="background">
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 mx-0">
        <div class="card-body">
            <div class="card-content">
                <div class="row mx-0">
                    <!-- Cards -->
                    <div class="col-md-3">
                        <div class="feature-card text-center p-4 rounded fade-in-right">
                            <div class="icon mb-3">
                                <i class="fas fa-book-open fa-3x"></i>
                            </div>
                            <h4 class="feature-title">Comprehensive Quran Courses</h4>
                            <p>Learn Quran recitation, memorization, and understanding with expert tutors.</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="feature-card text-center p-4 rounded fade-in-up">
                            <div class="icon mb-3">
                                <i class="fas fa-language fa-3x"></i>
                            </div>
                            <h4 class="feature-title">Arabic Language Mastery</h4>
                            <p>Master the Arabic language from basics to advanced levels with our interactive classes.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="feature-card text-center p-4 rounded fade-in-bottom">
                            <div class="icon mb-3">
                                <i class="fas fa-chalkboard-teacher fa-3x"></i>
                            </div>
                            <h4 class="feature-title">Experienced Tutors</h4>
                            <p>Learn from certified and experienced tutors who are passionate about teaching.</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="feature-card text-center p-4 rounded fade-in-left">
                            <div class="icon mb-3">
                                <i class="fas fa-headset fa-3x"></i>
                            </div>
                            <h4 class="feature-title">24/7 Support</h4>
                            <p>Get round-the-clock support to assist with your learning needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    @foreach($sections as $section)
        <div class="row align-items-center bg-dark text-light p-5 section">
            @if($loop->index % 2 == 0)
                <div class="col-md-6 text-left animate-from-left">
                    <h2 class="display-4">{{ $section->title }}</h2>
                    <p>{{ strip_tags($section->description) }}</p>
                </div>
                <div class="col-md-6 text-center animate-from-right">
                    @if($section->videoId)
                        <iframe class="img-fluid rounded" style="height: 470px; width: 100%;"
                            src="https://www.youtube.com/embed/{{ $section->videoId }}" frameborder="0"
                            allowfullscreen></iframe>
                    @elseif($section->image)
                        <img src="{{ asset('storage/' . $section->image) }}"
                            alt="{{ $section->title }}" class="img-fluid rounded" style="height: 470px; width: 100%;">
                    @else
                        <p>No media available</p>
                    @endif
                </div>
            @else
                <div class="col-md-6 text-center animate-from-left">
                    @if($section->videoId)
                        <iframe class="img-fluid rounded" style="height: 470px; width: 100%;"
                            src="https://www.youtube.com/embed/{{ $section->videoId }}" frameborder="0"
                            allowfullscreen></iframe>
                    @elseif($section->image)
                        <img src="{{ asset('storage/' . $section->image) }}"
                            alt="{{ $section->title }}" class="img-fluid rounded" style="height: 470px; width: 100%;">
                    @else
                        <p>No media available</p>
                    @endif
                </div>
                <div class="col-md-6 text-right animate-from-right">
                    <h2 class="display-4">{{ $section->title }}</h2>
                    <p class="animate-from-bottom">{{ strip_tags($section->description) }}</p>
                </div>
            @endif
        </div>
    @endforeach
</div>
<br><br>

<div class="about-section">
    <div class="card tilted-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 d-flex justify-content-start ">
                    <h2 class="d-inline-block position-relative z-index-1 bolder text-left animate-from-left"
                        style="font-size: 3rem; font-weight: 800; color:white;">
                        About Us</h2>
                </div>
                <div class="col-md-4 d-flex justify-content-end animate-from-right"><a
                        href="{{ route('about.show', $about->id) }}"
                        class="btn btn-outline-primary animate-from-right">Show More</a></div>
            </div>
            <p class="card-text">
                {!! Str::limit($about->description, 150) !!}
            </p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 d-flex justify-content-start">
        <div class="text-left my-5 position-relative animate-from-left">
            <h2 class="d-inline-block position-relative z-index-1 bolder"
                style="font-size: 3rem; font-weight: 800; color:white;">Articles</h2>
            <p style="font-size:1.5rem;">
                <span>Discover enriching Arabic articles that inspire the mind and soul</span>
                <i style="width:2rem; height:2rem; color:#fff;" data-feather="star"></i>
            </p>
        </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-primary my-5 animate-from-right" style="width: 150px; height: 50px;">See
            All</a>
    </div>
</div>

<div class="row">
    @foreach($articles as $article)
        <div class="col-md-4 mb-4 animate-from-bottom">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                    alt="{{ $article->title }}">
                <div class="card-body article-info">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100, '...') }}
                    </p>
                    <a href="{{ route('articles.show', $article->id) }}"
                        class="btn btn-primary">Read more..</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop


    @section('page-script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            var lastScrollTop = 0; // متغير لتخزين آخر قيمة تمرير

            function checkVisibility() {
                var windowHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var windowBottom = scrollTop + windowHeight; // أسفل النافذة
                var scrollDirection = (scrollTop > lastScrollTop) ? 'up' : 'down'; // تحديد اتجاه التمرير
                lastScrollTop = scrollTop; // تحديث قيمة آخر تمرير

                // تحقق من جميع العناصر التي تحتوي على الأنيميشن
                $('.fade-in-right, .fade-in-left, .fade-in-up, .fade-in-bottom').each(function () {
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
        $(document).ready(function () {
            function checkVisibility() {
                var windowHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var windowBottom = scrollTop + windowHeight;

                // تحقق من جميع العناصر التي تحتوي على الأنيميشن
                $('.animate-from-left, .animate-from-right').each(function () {
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



        $(document).ready(function () {
            function checkVisibility() {
                var windowHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var windowBottom = scrollTop + windowHeight;

                // تحقق من جميع العناصر التي تحتوي على الأنيميشن
                $('.animate-from-left, .animate-from-right, .animate-from-bottom').each(function () {
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
