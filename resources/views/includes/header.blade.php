<div class="top-nav">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <a href="mailto:{{ setting('site.email') }}"> <i class='bx bxs-envelope'></i>
                    {{ setting('site.email') }}</a>
                <a href="tel:+{{ setting('site.contact') }}"> <i class='bx bxs-phone-call'></i>
                    {{ setting('site.contact') }}</a>
            </div>
            <div class="col-auto social-links">
                <a href="https://www.facebook.com/Vision-Dynamik-104906801256391/?modal=admin_todo_tour"><i class='bx bxl-facebook'></i></a>
                <a href="https://twitter.com/VDynamik"><i class='bx bxl-twitter'></i></a>
                <a href="https://www.instagram.com/vision_dynamik/"><i class='bx bxl-instagram'></i></a>
                <a href="https://www.youtube.com/channel/UCJITHlNEna0_Q86bA9eMQ5A?view_as=subscriber"><i class='bx bxl-youtube'></i></a>
            </div>
        </div>
    </div>
</div>
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-back sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="object-fit:contain; height:55px" src="{{ asset(Voyager::image(setting('site.logo'))) }}"
                alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mx-5">
                <li class="nav-item px-3">
                    <a class="nav-link text-bold active" aria-current="page"
                        href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-bold" href="{{ url('about') }}">A propos</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-bold" href="{{ url('projects') }}">Nos projets</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-bold" href="{{ url('blog') }}">Blog</a>
                </li>
                <li class="nav-item px-3">
                    <a href="{{ url('contact') }}" class="nav-link text-bold">Contact</a>
                </li>
            </ul>
            <a style="margin-right:5px" class="btn btn-success" href="{{ url('') }}">Faire un don</a>
        </div>
    </div>
</nav>
