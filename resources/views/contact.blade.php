@extends('layouts.site')

@section('content')
    <div id="top_banner"
        style="background-image: url({{ asset('images/hcp1.jpg') }}); background-size:cover;
         background-position:center center;">
        <div class="d-flex flex-column justify-content-center align-items-center"
            style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
            <h1 class="text-center page-title text-white mb-3">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Accueil</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <section id="contact" class="my-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="row align-items-center">
                <div class="col-12 col-sm-6 col-lg-4">
                    <img style="object-fit: cover; height:400px;width:100%" src="{{ asset('contact.jpg') }}" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" cols="30" rows="4"
                                class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
