<?php

namespace App\Http\Controllers;
use App\AdvVaccine;
use App\AdvVaccineTiming;
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

    public function showadvvaccinesofcurdoc ($doc_id) {
      $advvaccines = AdvVaccine::where('doc_id', $doc_id)->get();
      return view ('showadvvaccinesofcurdoc')
      ->with('advvaccines', $advvaccines)
      ->with('doc_id', $doc_id);
    }

    public function editingvaccineshow($vid, $doc_id) {
      $advvaccine = AdvVaccine::find($vid);
      $advvaccine_timings = AdvVaccineTiming::where('v_id', $vid)->get();
      return view ('editingvaccine')
      ->with('advvaccine', $advvaccine)
      ->with('$advvaccine_timings', $advvaccine_timings)
      ->with('doc_id', $doc_id);
    }

    public function updatevaccine($vid, $doc_id, Request $request) {
      $advvaccine = AdvVaccine::find($vid);
      $advvaccine->vname = $request->vname;
      $advvaccine->vdescription = $request->vdescription;
      $advvaccine->save();
      return redirect('editingvaccine/' . $vid . '/' . $doc_id);
    }

    public function deletevaccine($vid, $doc_id) {
      $advvaccine = AdvVaccine::find($vid);
      echo "delete commented";
      //$center->delete();
      return redirect('showadvvaccinesofcurdoc/' . $doc_id);
    }
}
