@extends('layouts.site')

@section('content')
{{-- Banner Slides --}}
<div id="banner-slide">
    @php
    $banners=App\Models\SectionMedia::find(3);
    @endphp
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach (json_decode($banners->medias) as $key=> $banner)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{$key==0? 'active' :'' }}" aria-current="true" aria-label="Slide {{ $key }}"></button>
            @endforeach
            {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button> --}}

        </div>
        <div class="carousel-inner">

            @foreach (json_decode($banners->medias) as $key=> $banner)
            @if ($key==0)
            <div class="carousel-item banner active">
                <img src="{{ asset(Voyager::image($banner)) }}" class="d-block w-100" alt="...">
                <div class="bg-overlay"></div>
            </div>
            @else
            <div class="carousel-item banner">
                <img src="{{ asset(Voyager::image($banner)) }}" class="d-block w-100" alt="...">
                <div class="bg-overlay"></div>
            </div>
            @endif

            @endforeach


            <div class="bg-text text-center">
                <div class="container content-overlay">
                    <h2 class="banner-title text-white">A l’’Hôtel Chic Palace, c’est le confort, la sérénité et la sécurité !</h2>
                    {{-- <p class="text-white">Une ONG qui a pour mission d'aider et de soutenir les démunis</p> --}}
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@include('includes.services')

{{-- About --}}

<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texte -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="about-title my-4" data-aos="fade-left">Qui sommes-nous?</h2>
                <p>
                    L’Hôtel Chic Palace est un joyau situé à l’entrée de la ville de Kpalimé. Il associe élégance, douceur et luxe pour offrir un cadre agréable et reposant. Avec une équipe dynamique à votre service, découvrez autrement l’hôtelerie à Kpalimé. Soyez chez nous comme chez vous !
                </p>
                <a href="{{ url('about') }}" class="btn btn-main">En savoir plus</a>
            </div>

            <!-- Image -->
            <div class="col-lg-6 about-image">
                <img data-aos="fade-right" src="{{ asset('images/dom_hebergement.jpg') }}" alt="À propos de nous">
            </div>
        </div>
    </div>
</section>

{{-- Projets --}}
<section id="projects">
    <div class="container">
        <h2 class="section-title text-left mb-5"><strong>Nos chambres</strong></h2>

        <div class="owl-theme owl-carousel" id="projects-slider">
            @foreach ($rooms as $room)
            <div class="project">
                <a class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#room{{ $room->id }}">
                    <div class="overlay"></div>
                    @php
                    $images = json_decode($room->images); // Décoder le JSON en tableau PHP
                    $firstImage = $images[0] ?? null; // Récupérer la première image (ou null si vide)
                    @endphp

                    @if($firstImage)
                    <img class="project-img" src="{{ asset(Voyager::image($firstImage)) }}" alt="Image principale">
                    @else
                    <p>Aucune image disponible</p>
                    @endif
                    <div class="content d-flex justify-content-between px-4">
                        <div>
                            <h4 class="text-white">{{ $room->title }}</h4 class="text-white">
                            <span class="badge rounded-pill text-bg-info fs-6">{{ $room->price }} F CFA</span>


                        </div>
                        <div style="align-self: flex-end">
                            <a class="btn btn-success" style=" position: relative; bottom: 0;" class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#room{{ $room->id }}">Réserver</a>

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

<!--Section: Content-->

<section class="text-center" style="background-color: #a6836d ">
    {{-- <h2 class="section-title mb-5 text-center text-white" data-aos="fade-left">Galerie d'images</h2> --}}

    <div class="photo-gallery">
        @php
        $galeries=App\Models\SectionMedia::find(1);
        @endphp
        @for ($i=0; $i < 12; $i++) <div class="gallery-item">
            <img src="{{ asset(Voyager::image(json_decode($galeries->medias)[$i])) }}" alt="Photo 1" class="galery-img">
    </div>

    @endfor
    {{-- @foreach (json_decode($galeries->medias) as $galery)
    <div class="gallery-item">
        <img src="{{ asset(Voyager::image($galery)) }}" alt="Photo 1" class="galery-img">
    </div>
    @endforeach --}}

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
