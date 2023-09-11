@extends('voyager::master')

@section('content')
<div class="page-content browse container-fluid">
    <h2>{{ $activity->title }}</h2>
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Naissance</th>
                            <th>Profession</th>
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

                        </tr>
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
