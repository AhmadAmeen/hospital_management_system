<?php

namespace App\Http\Controllers;
use App\Patient;
use App\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function show ($pat_id) {
      //create diseases array
        $d_names = array (
          'Brachial Plexus Palsy',
          'Brain Tumors',
          'Breath-holding Spell',
          'Breathing Trouble',
          'Acne',
          'Hep',
        );
        $d_desc = array (
          'Brachial xyz',
          'Brain xyz',
          'Breath xyz',
          'Brething xyz',
          'Acne xyz',
          'Hep xyz',
        );
      $patient = Patient::find($pat_id);
      return view('addpatientmedhistory')
      ->with('patient', $patient)
      ->with('d_names', $d_names)
      ->with('d_desc', $d_desc);
    }

    public function patientmedhistorystore($pat_id, Request $request) {
     if($request->check) {
      for($i = 0; $i < count($request->check); $i++) {
        $med_history = new MedicalHistory;
        $med_history->patient_id = $pat_id;
        $med_history->dname = ($request->check[$i] == "TRUE") ? $request->dname[$i] : 'FALSE';
        $med_history->disease_desc = ($request->check[$i] == "TRUE") ? $request->disease_desc[$i] : 'FALSE';
        $med_history->save();
      }
      return redirect('addvaccinationhistory/' . $pat_id);
    } else {
      return redirect('addmedicalhistory/' . $pat_id);
    }
   }

   public function editmedicalhistory ($pat_id) {
     $patient = Patient::find($pat_id);
     $med_histories = MedicalHistory::where('patient_id', $pat_id)->get();
     return view ('editmedicalhistory')->with('patient', $patient)->with('med_histories', $med_histories);
   }
}
