<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Vaccine;

class VaccineController extends Controller
{
    public function show ($current_doc_id) {
      return view ('docregform_vaccinedetails')->with('current_doc_id', $current_doc_id);
    }

    public function doctorvaccinestore (Request $request) {
      $vaccine = new Vaccine;
      $vaccine->vname = $request->vname;
      $vaccine->vtiming = $request->vtiming;
      $vaccine->doc_id = $request->doc_id;
      $vaccine->save();
      $current_doc_id = $vaccine->doc_id;
      return view ('docregform_vaccinedetails')->with('current_doc_id', $current_doc_id);
    }
}
