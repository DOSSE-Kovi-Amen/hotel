@extends('layouts.site')

@section('content')
<style>
    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    input {
        outline: 0;
    }

    #search input {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;

    }

    @media (max-width: 767.98px) {
        #search input {
            width: 80%;
            box-shadow: 0px 6px 30px rgba(0, 0, 0, 0.08);
        }

        #search button {
            width: 50px
        }
    }

    @media (min-width: 767.98px) {
        #search input {
            width: 800px;
            box-shadow: 0px 6px 30px rgba(0, 0, 0, 0.08);

        }

        #search button {
            width: 60px
        }
    }

</style>
<div id="top_banner" style="background-image: url({{ asset('images/bg_banner1.jpg') }}); background-size:cover;
background-position:center center;">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
        <h1 class="text-center page-title text-white mb-3"><strong>Blog</strong></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-white">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Accueil</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
            </ol>
        </nav>
        <div class="container">
            <form action="{{ url('blog/search') }}" method="get">
                @csrf
                <div id="search" class="input-group d-flex flex-row justify-content-center align-items-center">

                    <input style="font-weight:bold;" name="search" type="search" class="p-2" placeholder="Rechercher un article" />
                    <button type="submit" class="btn btn-success p-3">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>


        </div>
    </div>

</div>
{{-- Category --}}
<div class="position-sticky bg-white" style="top:95px;z-index:1">
    <div class="nav-scroller py-1 mb-2">
        <div class="container">
            <nav class="nav d-flex justify-content-between">
                @foreach ($categories as $category)
                <a class="p-2 link-secondary fw-bold" href="{{ url('blog/category/'.$category->slug)}}">{{ $category->name }}</a>
                @endforeach
            </nav>
        </div>

    </div>
</div>


<section class="bg-light">

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="border-0">
                    @if ($post->category != null)

                    <a href="{{ url('blog/article/' . $post->category->slug . '/' . $post->slug) }}">
                        @else
                        <a href="{{ url('blog/article/all/' . $post->slug) }}">
                        @endif
                        <div class="bg-image hover-overlay ripple position-relative">
                            <img style="object-fit: cover; height:200px; width:100%;" src="{{ asset(Voyager::image($post->image)) }}" class="img-fluid" alt="{{ $post->title }}" />
                            <div style="position: absolute;top:10px;left:10px;">
                                <span class="badge px-5 rounded-pill text-bg-success fs-6">{{ $post->category->name??'' }}</span>

                            </div>

                        </div>
                        <div class="">
                            <p class="text-left">{{ $post->updated_at->format('d/m/Y') }} | posté par <span style="color: orange">{{ $post->author?->name?? 'inconnu' }}</span> </p>
                            <h5 class="text-justify text-capitalize">{{ $post->title }}</h5>
                            {{-- <p class="text-center text-justify">
                                    {!! $post->excerpt !!}
                                </p> --}}
                        </div>
                    </a>


                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $posts->onEachSide(1)->links() }}

            </div>

        </div>
    </div>
</section>
@endsection
