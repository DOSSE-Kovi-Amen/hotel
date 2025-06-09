@extends('layouts.site')

@section('content')
    {{-- Banner Slides with Animations --}}
    <div id="banner-slide" data-aos="fade">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($hero_sections as $key => $hero_section)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                        aria-label="Slide {{ $key }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($hero_sections as $key => $hero_section)
                    <div class="carousel-item banner {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset(Voyager::image($hero_section->image)) }}" class="d-block w-100" alt="...">
                        <div class="bg-overlay"></div>
                        <div class="bg-text text-center">
                            <div class="container content-overlay">
                                <h2 class="banner-title text-white" data-aos="fade-up" data-aos-delay="300">
                                    {{ $hero_section->title }}</h2>
                                <p class="text-white" data-aos="fade-up" data-aos-delay="500">
                                    {{ $hero_section->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    @include('includes.services')

    {{-- About Section --}}
    @include('includes.about')

    {{-- Rooms Section with Animations --}}
    <section id="projects" data-aos="fade-up">
        <div class="container mb-5">
            <h2 class="section-title text-left mb-5 mt-5" data-aos="fade-right"><strong>Nos chambres</strong></h2>

            <div class="owl-theme owl-carousel" id="projects-slider">
                @foreach ($rooms as $key => $room)
                    <div class="project" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                        <a class="text-white" href="#" data-bs-toggle="modal"
                            data-bs-target="#room{{ $room->id }}">
                            <div class="overlay"></div>
                            @php
                                $images = json_decode($room->images);
                                $firstImage = $images[0] ?? null;
                            @endphp

                            @if ($firstImage)
                                <img class="project-img" src="{{ asset(Voyager::image($firstImage)) }}"
                                    alt="Image principale">
                            @else
                                <p>Aucune image disponible</p>
                            @endif
                            <div class="content d-flex justify-content-between px-4">
                                <div>
                                    <h4 class="text-white">{{ $room->title }}</h4>
                                    <span
                                        class="badge rounded-pill text-bg-info fs-6">{{ number_format($room->price, 0, ',', ' ') }}
                                        F CFA</span>
                                </div>
                                <div style="align-self: flex-end">
                                    <a class="btn btn-success" href="#" data-bs-toggle="modal"
                                        data-bs-target="#room{{ $room->id }}">Réserver</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <p class="text-center"><a class="btn btn-success mt-5 px-4 py-2" href="{{ url('rooms') }}">Voir tout</a></p>
        </div>

    </section>
    @foreach ($rooms as $room)
        @include('includes.modals.room')
    @endforeach

    {{-- @include('includes.booking') --}}



    <!--Section: Content-->
    {{-- <section id="blog" style="background: rgba(216, 216, 216, 0.226)">
    <div class="container text-center">
        <h3 class="section-subtile mb-1">BLOG</h3>
        <h2 class="section-title  mb-5 ">Derniers Posts</h2>

        <div class="row">
            @foreach ($last_posts as $post)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="bg-image hover-overlay ripple">
                        <img style="object-fit: cover; height:200px; width:100%;" src="{{ asset(Voyager::image($post->image)) }}" class="img-fluid" alt="{{ $post->title }}" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="text-left">{{ $post->updated_at->format('d/m/Y') }}</p>
                        <h5 class="card-title text-center text-capitalize">{{ $post->title }}</h5>
                        <p class="card-text text-center">
                            {!! $post->excerpt !!}
                        </p>
                    </div>

                    <p class="text-center"><a class="btn btn-dark" href="{{ url('blog/article/' . $post->category?->slug  . '/' . $post->slug) }}">Lire
                            l'article</a></p>
                </div>
            </div>
            @endforeach

        </div>
        <p class="text-center"><a class="btn btn-success mt-5 px-4 py-2" href="{{ url('blog') }}">Voir tout</a>
        </p>
    </div>
    </section> --}}

    {{-- Dishes Section with Animations --}}
    <section class="dishes-section" data-aos="fade-up">
        <div class="container">
            <h2 class="section-title" data-aos="fade-right">Nos délicieux plats</h2>

            <div class="dishes-carousel-wrapper">
                <div class="owl-carousel owl-theme owl-dishes">
                    @foreach ($dishes as $key => $dish)
                        <div class="item" data-aos="fade-up" data-aos-delay="{{ $key * 50 }}">
                            <div class="dish-card">
                                @if ($dish->is_featured)
                                    <span class="dish-badge">Recommandé</span>
                                @endif

                                <div class="dish-img-container">
                                    @php
                                        $images = json_decode($dish->images);
                                        $firstImage = $images[0] ?? 'default-dish.jpg';
                                    @endphp

                                    @if (count($images) > 1)
                                        <div id="dishCarousel-{{ $loop->index }}" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($images as $index => $image)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <img src="{{ Voyager::image($image) }}"
                                                            class="dish-img d-block w-100" alt="{{ $dish->name }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="carousel-indicators">
                                                @foreach ($images as $index => $image)
                                                    <button type="button"
                                                        data-bs-target="#dishCarousel-{{ $loop->index }}"
                                                        data-bs-slide-to="{{ $index }}"
                                                        class="{{ $index === 0 ? 'active' : '' }}"></button>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ Voyager::image($firstImage) }}" class="dish-img"
                                            alt="{{ $dish->title }}">
                                    @endif
                                </div>

                                <div class="dish-body">
                                    <h3 class="dish-title">{{ $dish->title }}</h3>
                                    <div class="dish-price">{{ number_format($dish->price, 2) }} F CFA</div>
                                    <p class="dish-description">{{ Str::limit($dish->excerpt, 120) }}</p>
                                    <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-outline-dark">Voir
                                        détails</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <p class="text-center"><a class="btn btn-success mt-5 px-4 py-2" href="{{ route('dishes.index') }}">Voir
                    tout</a></p>
        </div>
    </section>

    {{-- Gallery Section with Animations --}}
    <section class="text-center mb-5">
        <h2 class="section-title mb-5 text-center mt-4" data-aos="fade-left" style="color: #1a4922;">Galerie d'images
        </h2>

        <div class="photo-gallery">
            @foreach ($galleries as $gallery)
                @foreach (json_decode($gallery->images) as $key => $galleryImage)
                    <div class="gallery-item p-4">
                        <img src="{{ asset(Voyager::image($galleryImage)) }}" alt="Photo" class="galery-img">
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="gallery-pagination mt-8">
            {{ $galleries->links() }}
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 120,
                delay: 100
            });

            // Refresh AOS when carousels are initialized
            if (typeof $ !== 'undefined') {
                $('.owl-carousel').on('initialized.owl.carousel', function() {
                    AOS.refresh();
                });
            }
        });
    </script>
@endsection
