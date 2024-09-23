<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <!-- إضافة container لتحديد العرض -->
        <a class="navbar-brand" href="#">HIRAA</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#articles">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#courses">Courses</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light me-2" href="{{ url('/login') }}">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-warning" href="{{ route('signUp') }}">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
