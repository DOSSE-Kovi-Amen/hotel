<section class="about-section">
    <div style="background-color: #000000a0">
        <div class="overflow-hidden">
            <div class="about-container">
                <!-- Texte -->
                <div class="about-text p-5">
                    <h2 class="about-title my-4" data-aos="fade-left">Qui sommes-nous?</h2>
                    <p class="about-description">
                        L'Hôtel Chic Palace est un joyau situé à l'entrée de la ville de Kpalimé. Il associe élégance,
                        douceur et luxe pour offrir un cadre agréable et reposant. Avec une équipe dynamique à votre
                        service, découvrez autrement l'hôtelerie à Kpalimé. Soyez chez nous comme chez vous !
                    </p>
                    @if (!request()->is('about'))
                        <a href="{{ url('about') }}" class="btn btn-main">En savoir plus</a>
                    @endif
                </div>

                <!-- Image -->
                <div class="about-image" style="background-image: url({{ asset('pexels-pixabay-164595.jpg') }});">
                    <div class="image-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</section>
