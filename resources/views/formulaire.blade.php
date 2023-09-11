@extends('layouts.site')

@section('content')
<div style="height:100%;width:100%; background: linear-gradient(rgba(73, 73, 73, 0.377), rgba(0, 0, 0, 0.897));">
    <div class="container text-center">
        <h2 class="text-center py-3"><strong style="color: white">Formulaire d'inscription <span style="color: #e64e">({{ $activity->title }})</span></strong></h2>
        @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>

        @endif
    </div>
    @if ($activity->closed=='non')

    <form action="{{ url('formulaire') }}" method="post">
        @csrf


        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="card shadow col-12 col-lg-6 my-5 p-5">
                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                <div class="mb-3">
                    <label for="nom" class="form-label mt-3">Nom & Prénom</label>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="nom" required class="form-control" id="nom" placeholder="Nom">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="prenom" required class="form-control" id="prenom" placeholder="Prénom">

                        </div>
                    </div>
                    <label for="profession" class="form-label mt-3">Profession & nationalité</label>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="profession" required class="form-control" id="profession" placeholder="Profession">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="nationalite" required class="form-control" id="nationalite" placeholder="Nationalite">
                        </div>
                    </div>

                    <label for="naissance" class="form-label mt-3">Naissance & Sexe</label>

                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <input type="date" name="naissance" required class="form-control" id="naissance" placeholder="Profession">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genre" required id="genre" value="homme">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Homme
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genre" id="genre2" required value="femme">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Femme
                                </label>
                            </div>
                        </div>
                    </div>

                    <label for="email" class="form-label mt-3">Email & Téléphone</label>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <input type="email" name="email" required class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="telephone" required class="form-control" id="tel" placeholder="Téléphone">

                        </div>
                    </div>

                    <label for="email" class="form-label mt-3">Région</label>
                    <div class="form-group">
                        <label for="region">Sélectionnez une région :</label>
                        <select class="form-control" required id="region" name="region">
                            <option value="Savanes">Savanes</option>
                            <option value="Kara">Kara</option>
                            <option value="Centrale">Centrale</option>
                            <option value="Plateaux">Plateaux</option>
                            <option value="Maritime">Maritime</option>
                        </select>
                    </div>

                </div>
                <label for="prefecture" class="form-label mt-3">Préfecture</label>
                <input type="text" name="prefecture" required class="form-control" id="prefecture" placeholder="Préfecture">

                <label for="localite" class="form-label mt-3">Localité</label>
                <input type="text" name="localite" required class="form-control" id="localite" placeholder="Email">
                <div class="mb-3">
                    <label for="motivation" class="form-label">Motivation</label>
                    <textarea required class="form-control" name="motivation" id="motivation" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="experience" class="form-label">Expérience</label>
                    <textarea required class="form-control" name="experience" id="experience" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="attentes" class="form-label">Vos attentes</label>
                    <textarea required class="form-control" name="attentes" id="attentes" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="contribution" class="form-label">Contribution</label>
                    <textarea required class="form-control" name="contribution" id="contribution" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success"> Envoyer</button>

            </div>


        </div>
    </form>
    @else
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="card shadow col-12 col-lg-6 my-5 p-5">
                <div class="text-bold text-danger">
                    <h3 class="text-danger"> Cette activité a été clôturé
                    </h3>
                </div>
            </div>
        </div>

    </div>

    @endif

</div>

</div>


@endsection
