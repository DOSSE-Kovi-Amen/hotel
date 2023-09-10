@extends('layouts.site')

@section('content')
<div id="top_banner" style="background-image: url({{ asset('images/bg_banner1.jpg') }}); background-size:cover;
         background-position:center center;">
    <div class="d-flex flex-row justify-content-center align-items-center" style="height:500px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
        <h1 class="text-center text-white mb-5">Contact</h1>

    </div>
</div>
<section id="contact">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <img style="object-fit: cover; height:400px;width:100%" src="{{ asset('images/cntct.jpg') }}" alt="">
            </div>
            <div class="col-lg-6 offset-lg-1">
                <form>
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
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
