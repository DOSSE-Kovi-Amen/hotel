@extends('layouts.site')

@section('content')
<div id="top_banner" style="background-image: url({{ asset('images/bg_banner1.jpg') }}); background-size:cover;
         background-position:center center;">
    <div class="d-flex flex-row justify-content-center align-items-center" style="height:300px;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
        <h1 class="text-center text-white mb-5"><strong>A propos</strong></h1>

    </div>
</div>
<section id="about">
    <div class="container px-4">
        <div class="row align-items-center">
            <div class="col-12 col-sm-8 col-lg-6">
                <img style="object-fit: cover; height:500px;width:100%" src="{{ asset('images/about.jpg') }}" class="mx-lg-auto img-fluid" alt="about">
            </div>
            <div class="col-lg-6 mb-3">
                <h1 class="mb-3">Qui sommes-nous?</h1>
                <p>Vision Dynamik est une association qui, à travers ses activités inspire, forme et accompagne les jeunes ou tout autre groupe de personnes qui souhaitent avoir un impact positif sur leurs communautés par leurs leaderships et actions.
                    La méthode de Vision Dynamik se résume à l’inspiration, l’introspection et le passage à l’action, permettant de passer de l’envie à l’idée et de l’idée à l’action.</p>
            </div>

        </div>
    </div>
</section>

<div class="container">

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
</div>
@endsection
