@extends('layouts.site')

@section('content')
<div id="top_banner" style="background-image: url({{ asset('images/hcp1.jpg') }}); background-size:cover;
        background-position:center center;">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
        <h1 class="text-center page-title text-white mb-3"><strong>Nos Chambres</strong></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Accueil</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Nos projets</li>
            </ol>
        </nav>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <div class="row" data-aos="fade-right">
            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="project">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#project{{$room->id }}">
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

                                <span class="badge rounded-pill text-bg-info fs-6">{{ $room->price  }} FCFA</span>

                            </div>
                            <div style="align-self: flex-end">
                                <a class="btn btn-success" style=" position: relative; bottom: 0;" class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#room{{$room->id }}">Réserver</a>
                            </div>

                        </div>
                    </a>
                </div>

            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $rooms->onEachSide(1)->links() }}

            </div>

        </div>
        @foreach ($rooms as $room)
        @include('includes.modals.room')

        @endforeach
    </div>
</section>
{{-- @include('includes.services') --}}
@endsection
