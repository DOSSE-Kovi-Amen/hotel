@extends('voyager::master')

@section('content')
<div class="page-content browse container-fluid">
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="table-responsive">
                @foreach ($activities as $activity)
                <div>
                    <a href="{{ url('admin/inscriptions/'.$activity->id) }}">
                        {{ $activity->title }}
                    </a>
                </div>


                @endforeach



            </div>
        </div>
    </div>
</div>

@endsection
