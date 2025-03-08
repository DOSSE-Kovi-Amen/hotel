@extends('layouts.site')

@section('content')
<div id="top_banner" style="background-image: url({{ asset('images/hcp1.jpg') }}); background-size:cover;
         background-position:center center;">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
        <h1 class="text-center page-title text-white mb-3">Contact</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Accueil</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<section id="contact">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <img style="object-fit: cover; height:400px;width:100%" src="{{ asset('images/cntct.jpg') }}" alt="">
            </div>
            <div class="col-lg-6 offset-lg-1">
                {{-- <form>
                    <div class="mb-3">
                        <small>Nom</small>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <small>Email</small>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <small>Message</small>
                        <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Envoyer</button>
                </form> --}}
                <a class="btn btn-dark" href="mailto:contact@visiondynamik.org"> <i class='bx bxs-envelope'></i>
                    contact@visiondynamik.org</a>
            </div>
        </div>
    </div>
</section>
@endsection
