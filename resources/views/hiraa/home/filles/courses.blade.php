<style>
    /* توسيط الأزرار عمودياً */
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background-color: rgba(108, 108, 108, 0.5);
        /* خلفية شبه شفافة */
        display: flex;
        justify-content: center;
        align-items: center;
        top: 50%;
        margin: 0 2rem;
        /* جعلها في منتصف السلايدر */
        transform: translateY(-50%);
        /* لتوسيطها عموديًا */
        border-radius: 50%;
        /* دائرة بسيطة للأزرار */
    }

    /* تخصيص الأيقونات المخصصة */
    .custom-arrow i {
        width: 3rem !important;
        height: 3rem !important;
        color: white;
    }

    /* تأثير التحويم لزيادة وضوح الأزرار عند التمرير */
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        /* تكبير خلفية الزر عند التحويم */
    }

    /* لإضافة ظل للأزرار */
    .carousel-control-prev,
    .carousel-control-next {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* ظل خفيف */
    }
</style>

<div class="row">
    <div class="col-md-6 d-flex justify-content-start">
        <div class="text-left my-5 position-relative animate-from-left">
            <h2 class="d-inline-block position-relative z-index-1 bolder"
                style="font-size: 3rem; font-weight: 800; color:white;">
                Courses
            </h2>
            <p style="font-size:1.5rem;">
                <span>Discover enriching Arabic articles that inspire the mind and soul</span>
                <i style="width:2rem; height:2rem; color:#fff;" data-feather="star"></i>
            </p>
        </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-primary my-5 animate-from-right" style="width: 150px; height: 50px;">
            See All
        </a>
    </div>
</div>


<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        @foreach ($courses as $index => $course)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid rounded-start"
                                alt="{{ $course->title }}">
                        </div>
                        <div class="col-md-8  bg-dark text-light">
                            <div class="card-body">
                                <h1>{{ $course->name }}</h1>

                                <h2>{{ $course->title }}</h2>
                                <p class="card-text">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($course->description), 300, '...') !!}
                                </p>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Watch
                                    Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- أزرار التوجيه باستخدام أيقونات Feather -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="custom-arrow"><i data-feather="arrow-left" style="width: 2.5rem; height:3rem;"></i></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="custom-arrow"><i data-feather="arrow-right" style="width: 2.5rem; height:3rem;"></i></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- روابط الجافا سكريبت الخاصة بـ Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
