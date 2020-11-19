<?php

namespace App\Http\Controllers;
use App\AdvVaccine;
use Illuminate\Http\Request;

class AdvVaccineController extends Controller
{
    public function show($current_doc_id) {
        return view ('addadvvaccine')->with('current_doc_id', $current_doc_id);
    }

    public function store($current_doc_id, Request $request) {
      $vaccine = new AdvVaccine;
      $vaccine->vname = $request->vname;
      $vaccine->vdescription = $request->vdescription;
      $vaccine->doc_id = $current_doc_id;
      $vaccine->save();
      return redirect('addadvvaccinetiming/' . $vaccine->id);
    }
}
