<?php

namespace App\Http\Controllers;
use App\VaccinationHistory;
use App\Vaccine;
use App\Patient;
use Illuminate\Http\Request;

class VaccinationHistoryController extends Controller
{
  public function show ($pat_id)
  {
    $patient = Patient::find ($pat_id);
    $vaccines = Vaccine::where ('doc_id', $patient->doc_id)->get();
    return view ('vaccinehistoryview')->with('patient', $patient)->with('vaccines', $vaccines);
  }
}
