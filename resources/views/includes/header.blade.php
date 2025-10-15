<div class="top-nav">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                @php
                    $email = setting('site.email');
                    $phone = setting('site.contact');
                @endphp

                @if ($email)
                    <a href="mailto:{{ $email }}"> <i class='bx bxs-envelope'></i> {{ $email }}</a>
                @endif

                @if ($phone)
                    <a href="tel:{{ $phone }}"> <i class='bx bxs-phone-call'></i> {{ $phone }}</a>
                @endif
            </div>
            <div class="col-auto social-links">
                @php
                    $facebook = setting('site.facebook');
                    $twitter = setting('site.twitter');
                    $instagram = setting('site.instagram');
                    $youtube = setting('site.youtube');
                @endphp

                @if ($facebook)
                    <a target="_blank" href="{{ $facebook }}"><i class='bx bxl-facebook'></i></a>
                @endif

                @if ($twitter)
                    <a target="_blank" href="{{ $twitter }}"><i class='bx bxl-twitter'></i></a>
                @endif

                @if ($instagram)
                    <a target="_blank" href="{{ $instagram }}"><i class='bx bxl-instagram'></i></a>
                @endif

                @if ($youtube)
                    <a target="_blank" href="{{ $youtube }}"><i class='bx bxl-youtube'></i></a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-back sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="object-fit:contain; height:45px" src="{{ asset('images/logo2.png') }}" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mx-5">
                <li class="nav-item px-3">
                    <a class="nav-link text-capitalize {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-capitalize {{ request()->is('about') ? 'active' : '' }}"
                        href="{{ url('about') }}">A propos</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-capitalize {{ request()->is('rooms') ? 'active' : '' }}"
                        href="{{ url('rooms') }}">Nos chambres</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-capitalize {{ request()->is('dishes') ? 'active' : '' }}"
                        href="{{ url('dishes') }}">Restaurant</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-capitalize {{ request()->is('contact') ? 'active' : '' }}"
                        href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>

            <a style="margin-right:5px" class="btn btn-success" href="#booking">Réserver</a>
        </div>
    </div>
</nav>
