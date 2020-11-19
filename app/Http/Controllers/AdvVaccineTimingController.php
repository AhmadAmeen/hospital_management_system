<?php

namespace App\Http\Controllers;
use App\AdvVaccine;
use App\AdvVaccineTiming;
use Illuminate\Http\Request;

class AdvVaccineTimingController extends Controller
{
  public function show ($adv_vid) {
    $advvacccine = AdvVaccine::find($adv_vid);
    return view ('addadvvaccinetiming')->with('advvacccine', $advvacccine)->with('current_doc_id', $advvacccine->doc_id);
  }

  public function store($adv_vid, Request $request) {
    $vaccinetiming = new AdvVaccineTiming;
    $vaccinetiming->vtiming = $request->vtiming;
    $vaccinetiming->v_id = $adv_vid;
    $vaccinetiming->save();
    return redirect('addadvvaccinetiming/' . $adv_vid);
  }
}
