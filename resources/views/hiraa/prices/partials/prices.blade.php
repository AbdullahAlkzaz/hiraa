@foreach($prices as $price)
    <div class="col-md-4 d-flex justify-content-center">
        <div class="card">
            <div class="card-header-top">
                <h3>{{ $price->sessions_per_week }} Days/Week
                    @if(request('time') != $price->lecture_duration)
                        <small class="lecture-duration">{{ $price->lecture_duration }} mins</small>
                    @endif
                </h3>
            </div>
            <div class="card-content">
                <div>
                    @if($price->discount_type != "")
                        <h2 class="price">${{ $price->formatted_final_price }} /mo</h2>
                        <h4 class="original-price">${{ $price->formatted_price }} /mo</h4>
                    @else
                        <h2 class="price">${{ $price->formatted_price }} /mo</h2>
                    @endif
                </div>
                <ul class="features">
                    @foreach($price->features as $feature)
                        <li> {{ $feature }}</li>
                        <hr>
                    @endforeach
                </ul>
            </div>
            <a href="https://wa.me/yourwhatsappnumber" class="register-btn">REGISTER NOW</a>
        </div>
    </div>
@endforeach



<style>
    /* جعل البطاقة تأخذ الحجم الكامل مع الحفاظ على التناسب */
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
        text-align: center;
        width: 90vw;
        min-width: 100%;
        height: 45rem;
    }

    /* الجزء العلوي */
    .card-header-top {
        background-color: #007bff;
        padding: 15px;
    }

    .card-header-top h3 {
        color: #fff !important;
        font-size: 2.2vw;
        display: inline-block;
    }

    .card-header-top .lecture-duration {
        background: linear-gradient(63deg, #96abdd, #d1d4d9);
        ;
        padding: 0 .6rem;
        border-radius: 2rem;
        font-size: 1rem;
        color: #000;

    }


    /* الجزء السفلي */
    .card .register-btn {
        background-color: #007bff;
        color: white;
        display: block;
        padding: 10px;
        border-radius: 5rem;
        text-align: center;
        text-decoration: none;
        margin: 1rem;
        font-size: 2vw;
    }

    .card-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* توزيع المحتويات بالتساوي داخل المحتوى */
        height: 100%;
        padding: 20px;
        font-size: 1vw;
    }

    .card-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* توزيع المحتويات بالتساوي داخل المحتوى */
        height: 100%;
        padding: 20px;
        font-size: 1vw;
    }

    .price {
        font-size: 4vw;
        color: #333;
        margin-bottom: 10px;
    }

    .original-price {
        font-size: 1.5vw;
        color: #999;
        text-decoration: line-through;
        margin-bottom: 10px;
    }

    .features {
        list-style-type: none;
        /* إزالة النقاط من القائمة */
        padding: 0;
        /* إزالة الحشو الافتراضي */
        margin: 0;
        /* إزالة الهوامش الافتراضية */
        text-align: left;
        /* محاذاة النص إلى اليسار */
    }

    .features li {
        padding: 5px 0;
        /* إضافة مسافة بين العناصر */
        display: flex;
        /* استخدام flexbox لتحسين التنسيق */
        align-items: center;
        /* محاذاة العناصر عمودياً */
    }

    .features li::before {
        content: '✔';
        /* إضافة علامة صح */
        margin-right: 10px;
        /* مسافة بين العلامة والنص */
        color: green;
        /* لون العلامة */
    }

    .register-btn:hover {
        background-color: #128C7E;
    }

    /* جعل البطاقات في المنتصف دائمًا */
    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

</style>
