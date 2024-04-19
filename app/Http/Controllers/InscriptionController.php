<?php

namespace App\Http\Controllers;

use App\Exports\InscriptionExport;
use App\Models\Activity;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class InscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $activities = Activity::orderBy('title', 'asc')->get();
        return view('activities', compact('activities'));
    }

    public function index2($activity_id)
    {
        $activity = Activity::findOrFail($activity_id);

        $inscriptions = Inscription::where('activity_id', $activity_id)->get();
        return view('inscriptions', compact('inscriptions', 'activity'));
    }


    public function create()
    {
        //
    }


    public function store($inscription_id, Request $request)
    {
        Inscription::findOrFail($inscription_id)->update(['accepte' => $request->accepte]);

        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function print($inscription_id, $activity_id)
    {
        $activity = Activity::findOrFail($activity_id);
        $inscription = Inscription::findOrFail($inscription_id);

        return view('print-inscription', compact('inscription', 'activity'));
    }

    public function export()
    {
        return Excel::download(new InscriptionExport, 'inscriptions.xlsx');
    }
    public function destroy($inscription_id, Request $request)
    {
        Inscription::findOrFail($inscription_id)->delete();

        return back();
    }

}
