@extends('layouts.site')

@section('content')
<div id="top_banner" style="background-image: url({{ asset('images/hcp1.jpg') }}); background-size:cover;
         background-position:center center;">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.185));">
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
@endsection