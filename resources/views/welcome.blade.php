@extends('layouts.site')

@section('content')
    {{-- Banner Slides --}}
    <div id="banner-slide">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($hero_sections as $key => $hero_section)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                        aria-label="Slide {{ $key }}"></button>
                @endforeach
                {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button> --}}

            </div>
            <div class="carousel-inner">

                @foreach ($hero_sections as $key => $hero_section)
                    @if ($key == 0)
                        <div class="carousel-item banner active">
                            <img src="{{ asset(Voyager::image($hero_section->image)) }}" class="d-block w-100"
                                alt="...">
                            <div class="bg-overlay"></div>
                            <div class="bg-text text-center">
                                <div class="container content-overlay">
                                    <h2 class="banner-title text-white">{{ $hero_section->title }}</h2>
                                    <p class="text-white">{{ $hero_section->description }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item banner">
                            <img src="{{ asset(Voyager::image($hero_section->image)) }}" class="d-block w-100"
                                alt="...">
                            <div class="bg-overlay"></div>
                            <div class="bg-text text-center">
                                <div class="container content-overlay">
                                    <h2 class="banner-title text-white">{{ $hero_section->title }}</h2>
                                    <p class="text-white">{{ $hero_section->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
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

    {{-- About --}}
    @include('includes.about')

    {{-- Projets --}}
    <section id="projects">
        <div class="container mb-5">
            <h2 class="section-title text-left mb-5 mt-5"><strong>Nos chambres</strong></h2>

            <div class="owl-theme owl-carousel" id="projects-slider">
                @foreach ($rooms as $room)
                    <div class="project">
                        <a class="text-white" href="#" data-bs-toggle="modal"
                            data-bs-target="#room{{ $room->id }}">
                            <div class="overlay"></div>
                            @php
                                $images = json_decode($room->images); // Décoder le JSON en tableau PHP
                                $firstImage = $images[0] ?? null; // Récupérer la première image (ou null si vide)
                            @endphp

                            @if ($firstImage)
                                <img class="project-img" src="{{ asset(Voyager::image($firstImage)) }}"
                                    alt="Image principale">
                            @else
                                <p>Aucune image disponible</p>
                            @endif
                            <div class="content d-flex justify-content-between px-4">
                                <div>
                                    <h4 class="text-white">{{ $room->title }}</h4 class="text-white">
                                    <span class="badge rounded-pill text-bg-info fs-6">{{ $room->price }} F CFA</span>


                                </div>
                                <div style="align-self: flex-end">
                                    <a class="btn btn-success" style=" position: relative; bottom: 0;" class="text-white"
                                        href="#" data-bs-toggle="modal"
                                        data-bs-target="#room{{ $room->id }}">Réserver</a>

                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @foreach ($rooms as $room)
                @include('includes.modals.room')
            @endforeach
            <p class="text-center"><a class="btn btn-success mt-5 px-4 py-2" href="{{ url('rooms') }}">Voir tout</a>
            </p>
        </div>
    </section>


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

    {{-- Section plats --}}
    <section class="dishes-section">
        <div class="container">
            <h2 class="section-title">Nos délicieux plats</h2>
            
            <div class="dishes-carousel-wrapper">
                <div class="owl-carousel owl-theme owl-dishes">
                    @foreach($dishes as $dish)
                        @php
                            // Décoder le tableau stringifié d'images
                            $images = json_decode($dish->images);
                            $firstImage = $images[0] ?? 'default-dish.jpg';
                        @endphp
                        
                        <div class="item">
                            <div class="dish-card">
                                @if($dish->is_featured)
                                    <span class="dish-badge">Recommandé</span>
                                @endif
                                
                                <div class="dish-img-container">
                                    @if(count($images) > 1)
                                        <div id="dishCarousel-{{ $loop->index }}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($images as $index => $image)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <img src="{{ Voyager::image($image) }}" class="dish-img d-block w-100" alt="{{ $dish->name }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#dishCarousel-{{ $loop->index }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#dishCarousel-{{ $loop->index }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button> --}}
                                            <div class="carousel-indicators">
                                                @foreach($images as $index => $image)
                                                    <button type="button" data-bs-target="#dishCarousel-{{ $loop->index }}" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ Voyager::image($firstImage) }}" class="dish-img" alt="{{ $dish->title }}">
                                    @endif
                                </div>
                                
                                <div class="dish-body">
                                    <h3 class="dish-title">{{ $dish->title }}</h3>
                                    <div class="dish-price">{{ number_format($dish->price, 2) }} F CFA</div>
                                    <p class="dish-description">{{ Str::limit($dish->excerpt, 120) }}</p>
                                    <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-outline-dark">Voir détails</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <p class="text-center"><a class="btn btn-success mt-5 px-4 py-2" href="{{ route('dishes.index') }}">Voir tout</a>
            </p>
        </div>
    </section>

    <!--Section: Content-->

    <section class="text-center mb-5">
        <h2 class="section-title mb-5 text-center mt-4" data-aos="fade-left" style="color: #1a4922;">Galerie d'images
        </h2>

        <div class="photo-gallery">
            {{-- @php
                $galeries = App\Models\SectionMedia::find(1);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                <div class="gallery-item">
                    <img src="{{ asset(Voyager::image(json_decode($galeries->medias)[$i])) }}" alt="Photo 1"
                        class="galery-img">
                </div>
            @endfor --}}
            @foreach ($galleries as $gallery)
                @foreach (json_decode($gallery->images) as $galleryImage)
                    <div class="gallery-item p-4">
                        <img src="{{ asset(Voyager::image($galleryImage)) }}" alt="Photo 1" class="galery-img">
                    </div>
                @endforeach
            @endforeach

        </div>
        <div class="gallery-pagination mt-8">
            {{ $galleries->links() }}
        </div>

        <!-- Ajoutez davantage de div.gallery-item pour plus de photos -->
    </section>

    <!-- Galery -->
    {{-- <section class="text-center" style="background-color: #eeeeee">
    <h2 class="section-title mb-5" data-aos="fade-left">Partenaires</h2>
    <div class="photo-partner">
        @php
        $partners=App\Models\SectionMedia::find(2);
        @endphp
        @foreach (json_decode($partners->medias) as $partner)
        <div class="partner-item">
            <img src="{{ asset(Voyager::image($partner)) }}" alt="Photo 1" class="galery-img">
        </div>
        @endforeach

    </div>
</section> --}}
@endsection
