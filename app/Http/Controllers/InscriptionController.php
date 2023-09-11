<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscriptionController extends Controller
{

    public function index()
    {
        $activities= Activity::orderBy('title','asc')->get();
        return view('activities', compact('activities'));
    }

    public function index2($activity_id)
    {
        $activity= Activity::find($activity_id);

        $inscriptions= Inscription::where('activity_id',$activity_id)->get();
        return view('inscriptions', compact('inscriptions', 'activity'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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


    public function destroy($id)
    {
        //
    }
}
