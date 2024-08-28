<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">HIRAA</a>
    
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
                <a class="nav-link" href="{{ url('/login') }}">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('signUp') }}">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>
