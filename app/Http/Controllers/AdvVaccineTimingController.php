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
    $vaccinetiming->vt_type = $request->vt_type;
    $vaccinetiming->save();
    return redirect('addadvvaccinetiming/' . $adv_vid);
  }

  public function editvaccinetimings ($vid, Request $request) {
    $vaccine_timings = AdvVaccineTiming::where('v_id', $vid)->get();
    $advvacccine = AdvVaccine::find($vid);
    return view('editvaccinetimings')
    ->with('vaccine_timings', $vaccine_timings)
    ->with('advvacccine', $advvacccine);
  }

  public function updatevaccinetimings($vid, Request $request) {
    $vaccinetimings = AdvVaccineTiming::where('v_id', $vid)->get();
    for ($i = 0; $i < count($vaccinetimings); $i++) {
      $vaccinetiming = AdvVaccineTiming::find($request->vt_id[$i]);
      $vaccinetiming->vtiming = $request->vtiming[$i];
      $vaccinetiming->save();
      }
      return redirect ('editvaccinetimings/' . $vid);
  }

  public function deletevaccinetiming($vt_id) {
    $vaccinetiming = AdvVaccineTiming::find($vt_id);
    //$center_id = $centertiming->center_id;
    //$vaccinetiming->delete();
    echo "vt deleted";
    return redirect ('editvaccinetimings/' . $vid);
  }

  public function addvaccinetimingfromupdate($vid) {
    $advvacccine = AdvVaccine::find($vid);
    return view ('addvaccinetimingfromupdate')->with('advvacccine', $advvacccine)
    ->with('v_id', $advvacccine->v_id);
  }

  public function addingvaccinetiming($vid, Request $request) {
    $advvacccinetiming = new AdvVaccineTiming;
    $advvacccinetiming->v_id = $vid;
    $advvacccinetiming->vtiming = $request->vtiming;
    $advvacccinetiming->save();
    return redirect ('editvaccinetimings/' . $vid);
  }
}
