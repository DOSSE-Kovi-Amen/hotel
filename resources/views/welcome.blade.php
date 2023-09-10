@extends('layouts.site')

@section('content')
{{-- Banner Slides --}}
<div id="banner-slide">

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active banner">
                <img src="{{ asset('images/ban0.jpeg') }}" class="d-block w-100" alt="...">


                <div class="bg-overlay"></div>
            </div>
            <div class="carousel-item banner">
                <img src="{{ asset('images/ban2.jpeg') }}" class="d-block w-100" alt="...">
                {{-- <div class="bg-text text-center">
                    <div class="container">
                        <h1 class="banner-title text-white">Le BON SAMARITAIN</h1>
                        <p class="text-white">Une ONG qui a pour mission d'aider et de soutenir les démunis</p>
                    </div>
                </div> --}}
                <div class="bg-overlay"></div>

            </div>
            <div class="carousel-item banner">
                <img src="{{ asset('images/ban3.jpeg') }}" class="d-block w-100" alt="...">
                {{-- <div class="bg-text text-center">
                    <div class="container">
                        <h1 class="banner-title text-white">Le BON SAMARITAIN</h1>
                        <p class="text-white">Une ONG qui a pour mission d'aider et de soutenir les démunis</p>
                    </div>
                </div> --}}
                <div class="bg-overlay"></div>

            </div>
            <div class="carousel-item banner">
                <img src="{{ asset('images/ban4.jpeg') }}" class="d-block w-100" alt="...">
                {{-- <div class="bg-text text-right">
                    <div class="container">
                        <h1 class="banner-title text-white">Le BON SAMARITAIN</h1>
                        <p class="text-white"></p>
                    </div>
                </div> --}}
                <div class="bg-overlay"></div>

            </div>
            <div class="bg-text text-center">
                <div class="container">
                    <h1 class="banner-title text-white">VISION DYNAMIK POUR LA JEUNESSE</h1>
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
{{-- @include('includes.services') --}}

{{-- About --}}
<section id="about" style="background-color: #171512">
    <div class="container px-4">
        <div class="row align-items-center">

            <div class="col-12 col-sm-8 col-lg-6">
                <img data-aos="fade-right" src="{{ asset('images/about.png') }}" class="mx-lg-auto img-fluid" alt="about">
            </div>
            <div class="col-lg-6 mb-3">
                <h1 class="mb-3" data-aos="fade-left">Qui sommes-nous?</h1>
                <p>
                    Vision Dynamik est une association qui, à travers ses activités inspire, forme et accompagne les jeunes ou tout autre groupe de personnes qui souhaitent avoir un impact positif sur leurs communautés par leurs leaderships et actions.
                    La méthode de Vision Dynamik se résume à l’inspiration, l’introspection et le passage à l’action, permettant de passer de l’envie à l’idée et de l’idée à l’action.
                </p>

                <a href="{{ url('about') }}" class="btn btn-primary">En savoir plus</a>
            </div>
        </div>
    </div>
</section>
{{-- Services --}}

{{-- Projets --}}
<section id="projects">
    <div class="container">
        <h1 class="text-center mb-5"><strong>Projets</strong></h1>

        <div class="owl-theme owl-carousel" id="projects-slider">
            @foreach ($projects as $project)
            <div class="project">
                <a class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#project{{ $project->id }}">
                    <div class="overlay"></div>
                    <img class="project-img" src="{{ asset(Voyager::image($project->image)) }}" alt="">
                    <div class="content d-flex justify-content-between px-4">
                        <div>
                            <h4 class="text-white">{{ $project->title }}</h4 class="text-white">
                            @if ($project->status == 'coming')
                            <span class="badge rounded-pill text-bg-info fs-6">A venir</span>
                            @elseif($project->status == 'closed')
                            <span class="badge rounded-pill text-bg-dark fs-6">Terminé</span>
                            @else
                            <span class="badge rounded-pill text-bg-success fs-6">En cours</span>
                            @endif

                        </div>
                        <div style="align-self: flex-end">
                            <a style=" position: relative; bottom: 0;" class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#project{{ $project->id }}">En savoir
                                plus</a>

                        </div>

                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @foreach ($projects as $project)
        @include('includes.modals.project')
        @endforeach
        <p class="text-center"><a class="btn btn-primary mt-5 px-4 py-2" href="{{ url('projects') }}">Voir tout</a>
        </p>
    </div>
</section>

{{-- About --}}
<section id="about">
    <div class="container px-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-3">
                <h1 class="mb-3" data-aos="fade-left">Qui sommes-nous?</h1>
                <p>
                    Vision Dynamik est une association qui, à travers ses activités inspire, forme et accompagne les jeunes ou tout autre groupe de personnes qui souhaitent avoir un impact positif sur leurs communautés par leurs leaderships et actions.
                    La méthode de Vision Dynamik se résume à l’inspiration, l’introspection et le passage à l’action, permettant de passer de l’envie à l’idée et de l’idée à l’action.
                </p>

                <a href="{{ url('about') }}" class="btn btn-primary">En savoir plus</a>
            </div>
            <div class="col-12 col-sm-8 col-lg-6">
                <img data-aos="fade-right" style="object-fit: cover; height:500px;width:100%" src="{{ asset('images/about.jpg') }}" class="mx-lg-auto img-fluid" alt="about">
            </div>
        </div>
    </div>
</section>

<!--Section: Content-->
<section id="blog" style="background: rgba(216, 216, 216, 0.226)">
    <div class="container">
        <h3 class="section-title mb-1">BLOG</h3>
        <h2 class="section-subtile mb-5 text-left">Derniers Posts</h2>

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

                    <p class="text-center"><a class="btn btn-primary" href="{{ url('blog/article/' . $post->category?->slug  . '/' . $post->slug) }}">Lire
                            l'article</a></p>
                </div>
            </div>
            @endforeach

        </div>
        <p class="text-center"><a class="btn btn-primary mt-5 px-4 py-2" href="{{ url('blog') }}">Voir tout</a>
        </p>
    </div>
</section>
<!-- Galery -->
<section class="photo-partner">
    @php
    $partners=App\Models\SectionMedia::find(2);
    @endphp
    @foreach (json_decode($partners->medias) as $partner)
    <div class="partner-item">
        <img src="{{ asset(Voyager::image($partner)) }}" alt="Photo 1" class="galery-img">
    </div>
    @endforeach


    <!-- Ajoutez davantage de div.gallery-item pour plus de photos -->
</section>
<!--Section: Content-->

<section class="photo-gallery" style="background-color: rgba(201, 200, 200, 0.384)">
    @php
    $galeries=App\Models\SectionMedia::find(1);
    @endphp
    @foreach (json_decode($galeries->medias) as $galery)
    <div class="gallery-item">
        <img src="{{ asset(Voyager::image($galery)) }}" alt="Photo 1" class="galery-img">
    </div>
    @endforeach


    <!-- Ajoutez davantage de div.gallery-item pour plus de photos -->
</section>
@endsection
