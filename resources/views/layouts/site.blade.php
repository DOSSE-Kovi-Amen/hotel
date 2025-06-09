<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset(Voyager::image(setting('site.icon_image'))) }}" type="image/x-icon">

    <meta name="description" content="{{ setting('site.description') }}">

    <title>{{ setting('site.title') }}</title>
    <!-- Ajouter Playfair Display pour les titres -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dishes-style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                }
            });
        });
    </script>

    @yield('css')


</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div class="loader-content">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="loader-logo">
            <div class="loader-bar"></div>
        </div>
    </div>

    @include('includes.header')

    @yield('content')
    {{-- @include('includes.partner') --}}
    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    <section id="booking" class="newsletter-section">
        <div class="container py-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">Abonnez-vous à notre newsletter</h2>
                    <p class="mb-4">
                        Recevez les dernières nouvelles, mises à jour et offres exclusives directement dans votre boîte
                        mail.
                    </p>
                    <form action="{{ url('newsletters') }}" method="POST"
                        class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        @csrf
                        <input type="email" name="email" class="form-control mb-3 mb-md-0 me-md-2"
                            placeholder="Entrez votre adresse email" required />
                        <button type="submit" class="btn btn-primary">S'abonner</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    @include('includes.booking')

                </div>
            </div>
        </div>
    </section>
    @include('includes.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/all.min.css') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        $(document).ready(function() {
            $(".owl-dishes").owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.getElementById("preloader").style.opacity = "0";
                setTimeout(() => {
                    document.getElementById("preloader").style.display = "none";
                }, 500);
            }, 2000); // Disparaît après 3 secondes
        });
    </script>
    <script>
        document.addEventListener("scroll", function() {
            let scrollPosition = window.scrollY;
            let parallax = document.querySelector(".parallax-bg");

            if (parallax) {
                parallax.style.transform = `translateY(${scrollPosition * 0.2}px)`;
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".thumbnail-carousel").owlCarousel({
                items: 4,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    }
                }
            });
        });
    </script>
<script>
    function handleReservationClick(event) {
        event.preventDefault(); // empêche le comportement par défaut

        // Cible le modal ouvert
        const modal = bootstrap.Modal.getInstance(event.target.closest('.modal'));
        if (modal) {
            modal.hide(); // ferme le modal

            // Attend que le modal soit complètement caché
            setTimeout(() => {
                const bookingSection = document.getElementById("booking");
                if (bookingSection) {
                    bookingSection.scrollIntoView({ behavior: "smooth" });
                }
            }, 400); // 400ms pour laisser le modal se fermer proprement
        }
    }
</script>


</body>

</html>
