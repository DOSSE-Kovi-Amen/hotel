@extends('layouts.site')

@section('content')
    <div id="top_banner"
        style="background-image: url({{ asset('images/hcp1.jpg') }}); background-size:cover;
         background-position:center center;">
        <div class="d-flex flex-column justify-content-center align-items-center"
            style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
            <h1 class="text-center page-title text-white" data-aos="fade-left"><strong>A PROPOS</strong></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">A propos</li>
                </ol>
            </nav>
        </div>
    </div>

    @include('includes.about')

    @foreach ($services as $key => $service)
        @if ($key % 2 == 1)
            <section class="about-section">
                <div style="background-color: #000000a0">
                    <div class="overflow-hidden">
                        <div class="about-container">
                            <!-- Texte -->
                            <div class="about-text p-5">
                                <h2 class="about-title my-4" data-aos="fade-left">{{$service->title}}</h2>
                                <p class="about-description">
{{$service->description}} </p>
                                @if (!request()->is('about'))
                                    <a href="{{ url('about') }}" class="btn btn-main">En savoir plus</a>
                                @endif
                            </div>

                            <!-- Image -->
                            <div class="about-image"
                                style="background-image: url({{ asset(voyager::image($service->image)) }});">
                                <div class="image-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="service-section">
                <div>
                    <div class="overflow-hidden">
                        <div class="about-container">
                            <!-- Image -->
                            <div class="about-image"
                                style="background-image: url({{ asset(voyager::image($service->image)) }});">
                                <div class="image-overlay"></div>
                            </div>
                            <!-- Texte -->
                            <div class="about-text p-5">
                                <h2 class="about-title my-4" data-aos="fade-left">{{$service->title}}</h2>
                                <p class="about-description">
{{$service->description}} </p>
                                @if (!request()->is('about'))
                                    <a href="{{ url('about') }}" class="btn btn-main">En savoir plus</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
@endsection
