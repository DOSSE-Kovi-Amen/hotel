<!-- Modal -->
<div class="modal fade modal-danger" id="delete{{ $inscription->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ url('admin/inscription/delete/'.$inscription->id) }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="exampleModalLabel">Etes-vous sûr de vouloir supprimer l'inscription de {{ $inscription->nom.' '.$inscription->nom }} </h4>
                </div>
                <div class="modal-body">
                    Action irréversible
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary">Oui</button>
                </div>
            </div>
        </div>
    </form>
</div>
