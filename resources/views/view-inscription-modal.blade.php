<!-- Modal -->
<div class="modal fade modal-info" id="view{{ $inscription->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="exampleModalLabel">{{ $activity->title }}</h4>
            </div>
            <div class="modal-body">
                <p>Nom : {{ $inscription->nom }}</p>
                <p>Prénom : {{ $inscription->prenom }}</p>
                <p>Naissance : {{ $inscription->naissance }}</p>
                <p>Profession : {{ $inscription->profession }}</p>
                <p>Genre : {{ $inscription->genre }}</p>
                <p>Région : {{ $inscription->region }}</p>
                <p>Préfecture : {{ $inscription->prefecture }}</p>
                <p>Localité : {{ $inscription->localite }}</p>
                <p>Expérience : {{ $inscription->experience }}</p>
                <p>Motivation : {{ $inscription->motivation }}</p>
                <p>Vos attentes : {{ $inscription->attentes }}</p>
                <p>contribution : {{ $inscription->contribution }}</p>
                <p>Accepté :
                    @if($inscription->accepte==NULL )
                    <span class="badge badge-warning">En cours</span>
                    @elseif($inscription->accepte=='true')
                    <span class="badge badge-success">Oui</span>
                    @else
                    <span class="badge badge-danger">Non</span>
                    @endif
                </p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
