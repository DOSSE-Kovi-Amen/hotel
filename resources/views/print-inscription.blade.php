<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impression</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
    <style>
        /* Ajoutez ici vos styles personnalisés */
        .modal-content {
            font-size: 14px;
        }
        .modal-body p {
            margin-bottom: 5px;
        }
        .badge {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">{{ $activity->title }}</h4>
            </div>
            <div class="modal-body">
                <p><strong>Nom :</strong> {{ $inscription->nom }}</p>
                <p><strong>Prénom :</strong> {{ $inscription->prenom }}</p>
                <p><strong>Naissance :</strong> {{ $inscription->naissance }}</p>
                <p><strong>Profession :</strong> {{ $inscription->profession }}</p>
                <p><strong>Genre :</strong> {{ $inscription->genre }}</p>
                <p><strong>Tel :</strong> {{ $inscription->telephone }}</p>
                <p><strong>Email :</strong> {{ $inscription->email }}</p>
                {{-- <p><strong>Résidence :</strong> {{ $inscription->residence }}</p> --}}
                <p><strong>Région :</strong> {{ $inscription->region }}</p>
                <p><strong>Préfecture :</strong> {{ $inscription->prefecture }}</p>
                <p><strong>Localité :</strong> {{ $inscription->localite }}</p>
                <p><strong>Expérience :</strong> {{ $inscription->experience }}</p>
                <p><strong>Motivation :</strong> {{ $inscription->motivation }}</p>
                <p><strong>Vos attentes :</strong> {{ $inscription->attentes }}</p>
                <p><strong>Contribution :</strong> {{ $inscription->contribution }}</p>
                <p><strong>Accepté :</strong>
                    @if($inscription->accepte == NULL)
                    <span class="badge badge-warning">En cours</span>
                    @elseif($inscription->accepte == 'true')
                    <span class="badge badge-success">Oui</span>
                    @else
                    <span class="badge badge-danger">Non</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS et dépendances -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Script pour lancer l'impression -->
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
</html>
