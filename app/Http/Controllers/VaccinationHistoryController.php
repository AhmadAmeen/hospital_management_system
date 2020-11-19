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
    foreach ($advvaccines as $advvaccine) {
      $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
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
    
  }
}
