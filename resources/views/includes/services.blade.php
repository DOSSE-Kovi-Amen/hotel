{{-- <section id="services">

    <div class="container mt-5">
        <h2 style="color: #1a4922 " class="section-title text-center mb-5"><strong>Nos services</strong></h2>

        <div class="row justify-content-center">
            <!-- Hébergement -->
            <div class="col-lg-4 col-md-6">
                <div class="service card p-5 mb-4 d-flex flex-column shadow-lg border-0 align-items-center h-100">
                    <div class="icon bg-success">
                        <i class="fa-solid fa-bed"></i>
                    </div>
                    <div class="content text-center">
                        <h3 class="mt-3">Hébergement</h3>
                        <p>Bungalows climatisés, chambres climatisées et ventilées de type patio, pour un confort optimal.</p>
                    </div>
                </div>
            </div>

            <!-- Gastronomie -->
            <div class="col-lg-4 col-md-6">
                <div class="service card p-5 mb-4 d-flex flex-column shadow-lg border-0 align-items-center h-100">
                    <div class="icon bg-success">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <div class="content text-center">
                        <h3 class="mt-3">Gastronomie</h3>
                        <p>Un service de bar et restaurant proposant une cuisine variée dans une ambiance conviviale.</p>
                    </div>
                </div>
            </div>

            <!-- Autres Services -->
            <div class="col-lg-4 col-md-6">
                <div class="service card p-5 mb-4 d-flex flex-column shadow-lg border-0 align-items-center h-100">
                    <div class="icon bg-success">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div class="content text-center">
                        <h3 class="mt-3">Autres Services</h3>
                        <p>3 salles de conférence de différentes capacités, une piscine publique sécurisée, connexion internet & Canal+.</p>
                    </div>
                </div>
            </div>

            <!-- Salles de Conférence -->
            <div class="col-lg-6 col-md-6 mt-1">
                <div class="service card p-5 mb-4 d-flex flex-column shadow-lg border-0 align-items-center h-100">
                    <div class="icon bg-success">
                        <i class="fa-solid fa-chalkboard-teacher"></i>
                    </div>
                    <div class="content text-center">
                        <h3 class="mt-3">Salles de Conférence</h3>
                        <p>Des salles de 30, 150 et 300 places équipées pour conférences, séminaires, ateliers et plus.</p>
                    </div>
                </div>
            </div>

            <!-- Parking -->
            <div class="col-lg-6 col-md-6 mt-1">
                <div class="service card p-5 mb-4 d-flex flex-column shadow-lg border-0 align-items-center h-100">
                    <div class="icon bg-success">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="content text-center">
                        <h3 class="mt-3">Parking Intérieur</h3>
                        <p>Un parking spacieux et sécurisé est disponible pour tous vos événements et séjours.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section id="services">
    <div class="container mt-5">
        <h2 class="text-center mb-5" style="color: #1a4922;"><strong>Nos services</strong></h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="service card p-5 text-center shadow-lg border-0">
                        <div class="icon bg-success"><i class="fa-solid fa-bed"></i></div>
                        <h3 class="mt-3">Hébergement</h3>
                        <p>Bungalows climatisés, chambres climatisées et ventilées de type patio.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="service card p-5 text-center shadow-lg border-0">
                        <div class="icon bg-success"><i class="fa-solid fa-utensils"></i></div>
                        <h3 class="mt-3">Gastronomie</h3>
                        <p>Service de bar et restaurant proposant une cuisine variée.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="service card p-5 text-center shadow-lg border-0">
                        <div class="icon bg-success"><i class="fa-solid fa-building"></i></div>
                        <h3 class="mt-3">Autres Services</h3>
                        <p>3 salles de conférence, piscine sécurisée, connexion internet & Canal+.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="service card p-5 text-center shadow-lg border-0">
                        <div class="icon bg-success"><i class="fa-solid fa-chalkboard-teacher"></i></div>
                        <h3 class="mt-3">Salles de Conférence</h3>
                        <p>Des salles équipées pour conférences et séminaires.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="service card p-5 text-center shadow-lg border-0">
                        <div class="icon bg-success"><i class="fa-solid fa-car"></i></div>
                        <h3 class="mt-3">Parking Intérieur</h3>
                        <p>Un parking spacieux et sécurisé pour vos événements et séjours.</p>
                    </div>
                </div>
            </div>

            <!-- Pagination + Navigation -->
            <div class="swiper-pagination"></div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
        </div>
        <p class="text-center"><a class="btn btn-success mt-5 px-4 py-2" href="{{ url('services') }}">Voir plus</a>
        </p>
    </div>
</section>
