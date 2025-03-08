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
<section class="about-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Texte -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2>À propos de nous</h2>
          <p>
            L’Hôtel Chic Palace est un joyau situé à l’entrée de la ville de Kpalimé. Il associe élégance, douceur et luxe pour offrir un cadre agréable et reposant.   Avec une équipe dynamique à votre service, découvrez autrement l’hôtelerie à Kpalimé.  Soyez chez nous comme chez vous !
        </p>
          {{-- <p class="mb-4">
            <span class="fw-bold" style="color: #f49314;">Notre mission :</span> fournir des produits et services de qualité, tout en mettant l'accent sur la satisfaction client et l'impact positif sur la société.
          </p> --}}
          <a href="#" class="btn btn-custom">En savoir plus</a>
        </div>

        <!-- Image -->
        <div class="col-lg-6 about-image">
          <img src="images/dom_hebergement.jpg" alt="À propos de nous">
        </div>
      </div>
    </div>
  </section>

{{-- <div class="container">

    <div class="row p-5">
        <div class="col-lg-8">

            <h4 id="mission">MISSION ET VISION</h4>
            <p>
                Sont considérés comme dons, toutes libéralités collectées. Cependant, les dons sont répartis
                selon les besoins des enfants et emmagasinés dans un entrepôt pour usage futur

                Les instances de l’organisation ont le devoir de participer activement au stockage de biens par
                une collecte mensuelle de 5000 FCFA chacun, en dehors des libéralités.
                Les dons sont gérés et collectés par les chargés des relations publiques et par la secrétaire
                trésorière.

            </p>
            <h4 id="team">EQUIPE</h4>
            <p>Sont considérés comme dons, toutes libéralités collectées. Cependant, les dons sont répartis
                selon les besoins des enfants et emmagasinés dans un entrepôt pour usage futur

                Les instances de l’organisation ont le devoir de participer activement au stockage de biens par
                une collecte mensuelle de 5000 FCFA chacun, en dehors des libéralités.
                Les dons sont gérés et collectés par les chargés des relations publiques et par la secrétaire
                trésorière.
            </p>
            <h4 id="rapport">RAPPORTS ANNUELS</h4>
            <p>
                Sont considérés comme dons, toutes libéralités collectées. Cependant, les dons sont répartis
                selon les besoins des enfants et emmagasinés dans un entrepôt pour usage futur

                Les instances de l’organisation ont le devoir de participer activement au stockage de biens par
                une collecte mensuelle de 5000 FCFA chacun, en dehors des libéralités.
                Les dons sont gérés et collectés par les chargés des relations publiques et par la secrétaire
                trésorière.

            </p>
            <h4 id="transparence">TRANSPARENCE</h4>
            <p>
                Sont considérés comme dons, toutes libéralités collectées. Cependant, les dons sont répartis
                selon les besoins des enfants et emmagasinés dans un entrepôt pour usage futur

                Les instances de l’organisation ont le devoir de participer activement au stockage de biens par
                une collecte mensuelle de 5000 FCFA chacun, en dehors des libéralités.
                Les dons sont gérés et collectés par les chargés des relations publiques et par la secrétaire
                trésorière.

            </p>
        </div>
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 7rem;">

                <div id="more" class="list-group">
                    <a class="list-group-item list-group-item-action" href="#mission">Mission et vision</a>
                    <a class="list-group-item list-group-item-action" href="#team">Equipe</a>
                    <a class="list-group-item list-group-item-action" href="#rapport">Rapports annuels</a>
                    <a class="list-group-item list-group-item-action" href="#transparence">Transparence</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
