@extends('layouts.site')

@section('title', 'Notre Menu')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <style>
        .dishes-section {
            padding: 80px 0;
            background: #f9f5f0;
            font-family: 'Poppins', sans-serif;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 50px;
            text-align: center;
            color: #333;
            position: relative;
        }

        /* .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: #e67e22;
            margin: 15px auto;
        } */

        .dish-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            height: 100%;
        }

        .dish-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .dish-img-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .dish-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .dish-card:hover .dish-img {
            transform: scale(1.05);
        }

        .dish-body {
            padding: 20px;
        }

        .dish-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #333;
        }

        .dish-price {
            font-weight: 600;
            color: #e67e22;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .dish-description {
            color: #666;
            margin-bottom: 15px;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .dish-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #e67e22;
            color: white;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 10;
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        .page-item.active .page-link {
            background-color: #e67e22;
            border-color: #e67e22;
        }

        .page-link {
            color: #e67e22;
        }
    </style>
@endsection

@section('content')
    <div id="top_banner"
        style="background-image: url({{ asset('images/hcp1.jpg') }}); background-size:cover;
background-position:center center;">
        <div class="d-flex flex-column justify-content-center align-items-center"
            style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
            <h1 class="text-center page-title text-white mb-3"><strong>Restaurant</strong></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Accueil</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Nos plats</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="dishes-section">
        <div class="container">
            <!-- Ajout du compteur de chambres -->
            {{-- <div class="row mb-4" data-aos="fade-right">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <strong>{{ $dishes->total() }} menu(s)</strong> disponible(s)
                        </h4>
                        <div class="text-muted">
                            Affichage de {{ $dishes->firstItem() }} à {{ $dishes->lastItem() }} sur {{ $dishes->total() }}
                        </div>
                    </div>
                    <hr>
                </div>
            </div> --}}
            <h2 class="section-title">Notre Menu</h2>

            <div class="row">
                @foreach ($dishes as $dish)
                    @php
                        $images = json_decode($dish->images);
                        $firstImage = $images[0] ?? 'default-dish.jpg';
                    @endphp

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="dish-card">
                            @if ($dish->is_featured)
                                <span class="dish-badge">Recommandé</span>
                            @endif

                            <div class="dish-img-container">
                                <img src="{{ Voyager::image($firstImage) }}" class="dish-img" alt="{{ $dish->name }}">
                            </div>

                            <div class="dish-body">
                                <h3 class="dish-title">{{ $dish->name }}</h3>
                                <div class="dish-price">{{ number_format($dish->price, 2) }} F CFA</div>
                                <p class="dish-description">{{ Str::limit($dish->excerpt, 100) }}</p>
                                <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-sm btn-outline-dark">Voir
                                    détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $dishes->links() }}
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        // Vous pouvez ajouter du JavaScript si nécessaire
    </script>
@endsection
