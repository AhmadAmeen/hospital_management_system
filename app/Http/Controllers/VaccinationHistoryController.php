<?php

namespace App\Http\Controllers;
use App\VaccinationHistory;
use App\AdvVaccine;
use App\AdvVaccineTiming;
use App\Patient;
use Illuminate\Http\Request;

class VaccinationHistoryController extends Controller
{
  public function show ($pat_id)
  {
    $patient = Patient::find ($pat_id);
    $advvaccines = AdvVaccine::where ('doc_id', $patient->doc_id)->get();
    //print_r($advvaccines);
    foreach ($advvaccines as $advvaccine) {
      $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
      //echo $advvaccinetimings[0];
    }

    $v_timings = array (
      "2",
      "4",
      "6",
      "8",
      "10",
      "12",
      "14",
      "16",
    );

    return view ('vaccinehistoryview')
    ->with('patient', $patient)
    ->with('advvaccines', $advvaccines)
    ->with('v_timings', $v_timings)
    ->with('advvaccinetimings', $advvaccinetimings);
  }

  public function advvaccineforpatientstore($pat_id ,Request $request) {
    foreach ($request->vchecks as $vcheck) {
      $pieces = explode("-", $vcheck);
      echo $pieces[0] . " ";
      echo $pieces[1];
      echo "<br>";
      $vtimings = AdvVaccineTiming::where('v_id', $pieces[1])->where('vtiming', $pieces[0])->get();
      //print_r($vtimings);
      foreach ($vtimings as $vtiming) {
        //print_r($vtiming);
        echo "<br>";
        echo "<br>";
        echo "<br>";
        $v_history = new VaccinationHistory;
        $v_history->pat_id = $pat_id;
        $v_history->v_id = $pieces[1];
        $v_history->vt_id = $vtiming->id;
        $v_history->status = "TRUE";
        $v_history->save();
      }
    }
    return redirect('patientregform/' . session('recep_session'));
  }
}
