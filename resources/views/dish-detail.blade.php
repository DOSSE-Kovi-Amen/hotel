@extends('layouts.site')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <style>
        .dish-detail-section {
            padding: 80px 0;
            background: #f9f5f0;
            font-family: 'Poppins', sans-serif;
        }

        .dish-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .dish-header {
            padding: 40px 40px 20px;
            border-bottom: 1px solid #eee;
        }

        .dish-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .dish-meta {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .dish-price {
            font-weight: 600;
            color: #e67e22;
            font-size: 1.5rem;
            margin-right: 20px;
        }

        .dish-badge {
            background: #e67e22;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .dish-content {
            display: flex;
            flex-wrap: wrap;
        }

        .dish-gallery {
            flex: 0 0 60%;
            max-width: 60%;
            padding: 30px;
        }

        .dish-info {
            flex: 0 0 40%;
            max-width: 40%;
            padding: 30px;
            border-left: 1px solid #eee;
        }

        .dish-description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .dish-features {
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            margin-bottom: 15px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #e67e22;
            font-size: 1.2rem;
        }

        .feature-text strong {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .feature-text span {
            color: #666;
            font-size: 0.9rem;
        }

        /* Gallery Styles */
        .main-image {
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-carousel .item {
            padding: 5px;
        }

        .thumbnail-carousel img {
            height: 100px;
            width: 100%;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .thumbnail-carousel img:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 992px) {

            .dish-gallery,
            .dish-info {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .dish-info {
                border-left: none;
                border-top: 1px solid #eee;
            }
        }
    </style>
@endsection
@section('content')
    <section class="dish-detail-section">
        <div class="container">
            <div class="dish-container">
                <div class="dish-header">
                    <h1 class="dish-title">{{ $dish->title }}</h1>
                    <div class="dish-meta">
                        <div class="dish-price">{{ number_format($dish->price, 2) }} F CFA</div>
                        @if ($dish->is_featured)
                            <div class="dish-badge">Recommandé</div>
                        @endif
                    </div>
                </div>

                <div class="dish-content">
                    @php
                        $images = json_decode($dish->images);
                        $mainImage = $images[0] ?? 'default-dish.jpg';
                    @endphp

                    <div class="dish-gallery">
                        <div class="main-image">
                            <img src="{{ Voyager::image($mainImage) }}" id="mainDishImage" alt="{{ $dish->title }}">
                        </div>

                        @if (count($images) > 1)
                            <div class="thumbnail-carousel owl-carousel owl-theme">
                                @foreach ($images as $image)
                                    <div class="item">
                                        <img src="{{ Voyager::image($image) }}"
                                            onclick="document.getElementById('mainDishImage').src = this.src"
                                            alt="{{ $dish->title }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="dish-info">
                        <div class="dish-description">
                            {!! $dish->description !!}
                        </div>

                        <div class="dish-features">
                            @if ($dish->category)
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="icon ion-ios-restaurant"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Catégorie</strong>
                                        <span>{{ $dish->category }}</span>
                                    </div>
                                </div>
                            @endif

                            @if ($dish->preparation_time)
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="icon ion-ios-time"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Temps de préparation</strong>
                                        <span>{{ $dish->preparation_time }} minutes</span>
                                    </div>
                                </div>
                            @endif

                            @if ($dish->calories)
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="icon ion-ios-nutrition"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Calories</strong>
                                        <span>{{ $dish->calories }} kcal</span>
                                    </div>
                                </div>
                            @endif

                            @if ($dish->ingredients)
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="icon ion-ios-list"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Ingrédients principaux</strong>
                                        <span>{{ $dish->ingredients }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('dishes.index') }}" class="btn btn-outline-dark mr-3">
                                <i class="icon ion-ios-arrow-back"></i> Retour à la liste
                            </a>
                            {{-- <button class="btn btn-primary">
                                <i class="icon ion-ios-cart"></i> Commander
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
