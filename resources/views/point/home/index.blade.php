<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset("home/css/style.css") }}">
    <title>home page</title>
</head>

<body>

    <div class="container">
        <header>
            <div class="menuBar">
                <nav>
                    <button class="SUB" onclick="window.location.href='{{ url('/login') }}';">الإشتراك</button>
                    <a href="{{ url('/login') }}" target="_blank">تسجيل الدخول</a>
                    <a href="{{ url('/login') }}" target="_blank">تتبع الشحنة</a>
                    <button id="menuClose"><span class="material-symbols-outlined">
                            close
                        </span></button>
                    <a href="#services">الخدمات</a>
                    <a href="#about-us">عنا</a>
                    <a href="#call-us">تواصل معنا</a>
                </nav>
            </div>
            <button id="menuBtn"><span class="material-symbols-outlined">
                    menu
                </span></button>
            <a href="{{ url('/login') }}" target="_blank" class="logo"><img src="{{asset("home/css/img/point12.png")}}"></a>
        </header>
    
        <section class="main">
            <div class="main-b">
                <h1> بوينت بداية لكل نجاح</h2>
                    <p>جميع الخدمات المتعلقة بالمتجر بداية من التسويق إلي الشحن كلها في مكان واحد</p>
                    <div class="sociallink">
                        <a href="https://wa.me/201102518048" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        <a
                            href="https://l.instagram.com/?u=https%3A%2F%2Fwww.facebook.com%2Fpointshipment%3Fmibextid%3DZbWKwL&e=AT1R7VrTg3OYoZ5W5wFSK_kYvsvwBPMmQdWlrc8AyhtnBDkTVnyleGVZg8-v_gASG9JEhkpaVhBk3Nh2YffzoqOBzKaLgjNE"><i
                                class="fa-brands fa-facebook-f" target="_blank"></i></a>
                        <a href="https://www.instagram.com/point.cco" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>   
            </div>
            <img src="{{ asset("home/css/img/png12.png") }}" > 
        </section>
        <h2 class="title" >الخدمات</h2>
        <section class="carde" id="services">
            <div>
                <img src="{{ asset("home") }}/css/img/20943774.jpg" style="width:20rem">
                <h3>إدارة المنتجات</h3>
                <p>نحن نتميز عن الاخرين يمكنك مشاهدة هذا بنفسك</p>
                <div class="chec">
                    <span><i class="fa-solid fa-check"></i>أفضل نظام لإدارة المخازن 3 شهور مجانا</span><br>
                    <span><i class="fa-solid fa-check"></i> يمكنك شحن الفاتورة بسهولة من داخل المخزن</span><br>
                    <span><i class="fa-solid fa-check"></i> اشتراك رمزي للمخازن</span><br>
                    <span><i class="fa-solid fa-check"></i> نطام خاص لادارة الوارد المادية</span><br>
                </div>
                <a class="btn btn-primary" href="{{ url('/login') }}" target="_blank">انضم الينا</a>
            </div>
            <div>
                <img src="{{ asset("home") }}/css/img/8325.jpg" style="width:20rem">
                <h3>الشحن</h3>
                <p>نحن نتميز عن الاخرين يمكنك مشاهدة هذا بنفسك</p>
                <div class="chec">
                    <span><i class="fa-solid fa-check"></i> توصيل سريع</span><br>
                    <span><i class="fa-solid fa-check"></i> بناء الثقة بينك و بين عملائك</span><br>
                    <span><i class="fa-solid fa-check"></i> يمكنك تتبع الشحنة في اي وقت</span><br>
                    <span><i class="fa-solid fa-check"></i> خدمة عملاء مميزة علي مدار الساعة</span><br>
                    <span><i class="fa-solid fa-check"></i> سهولة استلام و تسليم فلوسك</span>
                </div>
                <a class="btn btn-primary" href="{{ url("/login") }}">تتبع شحنة</a>
                <a class="btn btn-primary" href="{{ url("/login") }}">انضم الينا</a>
            </div>

            <div>
                <img src="{{ asset("home") }}/css/img/516858.jpg" style="width:20rem">
                <h3>التسويق</h3>
                <p>نحن نتميز عن الاخرين يمكنك مشاهدة هذا بنفسك</p>
                <div class="chec">
                    <span><i class="fa-solid fa-check"></i>فريق تسويقي متميز</span><br>
                    <span><i class="fa-solid fa-check"></i>سرعة النتائج</span><br>
                    <span><i class="fa-solid fa-check"></i> خدمة عملاء مميزة علي مدار الساعة</span><br>                    
                    <span><i class="fa-solid fa-check"></i>أسعار مناسبة</span><br>
                </div>
                <button  onclick="window.location.href='https://wa.me/201102518048';"  target="_blank">تواصل معنا</button>
            </div>
        </section>
        <h2 class="title">عنا</h2>
        <section id="about-us">
            <img src="{{ asset("home") }}/css/img/200.jpg" alt="">
            <div>
                <p class="about-us">نحن من بداية عملنا ونحن نتمتع بالأمانة و الرضى عما نقوم به <br> وقد وجدنا هذا في عين
                    عملائنا الذين كانو بمثابة حافذ لا نهاية له <br> لهاذا نحن هنا </p>
            </div>
        </section>
    </div>
    <section class="fotar">
        <a href="#" class="logo"><img src="{{ asset("home") }}/css/img/point12.png"></a>
        <div class="searves">
            <h3>خدماتنا</h3>
            <span><a href="">الشحن</a></span><br>
            <span><a href="#">إدارة المنتجات</a></span><br>
            <span><a href="#">التسويق</a></span>
        </div>

        <div id="call-us" class="call-us">
            <h3>تواصل معنا</h3>
            <span>01102518048</span><i class="fa-brands fa-whatsapp"></i><br>
            </i><span>01220244742</span><i class="fa-solid fa-phone"></i>
            <h4>Email<h4>
                    <span>point15820232@gmail.com</span>
        </div>
        <div class="meadia">
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a
                href="https://l.instagram.com/?u=https%3A%2F%2Fwww.facebook.com%2Fpointshipment%3Fmibextid%3DZbWKwL&e=AT1R7VrTg3OYoZ5W5wFSK_kYvsvwBPMmQdWlrc8AyhtnBDkTVnyleGVZg8-v_gASG9JEhkpaVhBk3Nh2YffzoqOBzKaLgjNE"><i
                    class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/point.cco"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>
    </section>

    <script src="{{asset("home/js/script.js")}}"></script>
</body>

</html>