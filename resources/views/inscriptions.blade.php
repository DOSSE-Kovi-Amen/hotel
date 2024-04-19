@extends('voyager::master')

@section('content')
<div class="page-content browse container-fluid">
    <h2>{{ $activity->title }}</h2>
    <div class="panel panel-bordered">
        <a class="btn btn-success" href="{{ url('admin/inscription/excel') }}">
            Exporter en excel
        </a>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Naissance</th>
                            <th>Profession</th>
                            <th>CV</th>
                            <th>Accepté</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->nom }}</td>
                            <td>{{ $inscription->prenom }}</td>
                            <td>{{ $inscription->naissance }}</td>
                            <td>{{ $inscription->profession }}</td>
                            <td> @if ($inscription->cv)
                                <a href="{{ asset(Voyager::image($inscription->cv)) }}" download="{{ $inscription->nom.'_'.$inscription->prenom.'_cv.pdf' }}">Télécharger CV</a>
                                @endif</td>
                            <td>
                                @if($inscription->accepte==NULL )
                                <span class="badge badge-warning">En cours</span>
                                @elseif($inscription->accepte=='oui'|| $inscription->accepte=='true')
                                <span class="badge badge-success">Oui</span>
                                @else
                                <span class="badge badge-danger">Non</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#view{{ $inscription->id }}">
                                    <i class="voyager-eye"></i>
                                </a>
                                <form style="display: inline-block" action="{{ url('admin/inscription/'.$inscription->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="accepte" value="oui">
                                    <button type="submit" class="btn btn-success"><i class="voyager-check"></i></button>
                                </form>
                                <form style="display: inline-block" action="{{ url('admin/inscription/'.$inscription->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="accepte" value="non">
                                    <button type="submit" class="btn btn-danger"><i class="voyager-x"></i></button>
                                </form>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $inscription->id }}">
                                    <i class="voyager-trash"></i>
                                </a>
                                <a class="btn btn-info" href="{{ url('admin/inscription/print/'.$inscription->id.'/'.$activity->id) }}">
                                    Imprimer
                                </a>

                            </td>

                        </tr>
                        @include('view-inscription-modal')
                        @include('delete-inscription-modal')
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">

<!-- DataTables -->
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script src="{{ asset('datatables/jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
<script>
    let table = new DataTable('#dataTable', {
        responsive: true
    });

</script>
@endsection
