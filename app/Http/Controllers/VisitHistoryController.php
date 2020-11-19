<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\VisitHistory;
use App\Patient;
use App\Receptionist;
Use Session;

class VisitHistoryController extends Controller
{
  public function vh_main_patients (Request $request) {

    //find current receptionist
    $recep_id = $request->session()->get('recep_session');
    $receptionist = Receptionist::find($recep_id);
    //getting all patients
    $patients = Patient::where('doc_id', $receptionist->doc_id)->paginate(5);
    return view ('vh_main_patients')->with('patients', $patients);
  }

  public function vh_patient ($id) {
    $pvhistories = VisitHistory::where('patient_id', $id)->get();
    if (!$pvhistories) {
      return view ('addnewpatienthistory');
    } else {
      $patient = Patient::find($id);
      return view ('vh_patient')->with('pvhistories', $pvhistories)
      ->with('patient', $patient);
    }
  }

  public function addnewpvhhistory ($id) {
    return view ('addnewpvhhistory')->with('patient_id', $id);
  }

  public function addingpatientvh ($id, Request $request) {
    $visit_history = new VisitHistory;
    $visit_history->patient_id = $id;
    $visit_history->date = $request->date;
    $visit_history->head_size = $request->head_size;
    $visit_history->length = $request->length;
    $visit_history->weight = $request->weight;
    $visit_history->temperature = $request->temperature;
    $visit_history->other = $request->other;
    $visit_history->save();
    return $this->vh_patient($id);
  }


  public function vh_getseachedpatients (Request $request) {
   $patients = Patient::where('fname' ,$request->pname)
   ->orwhere('lname' ,$request->pname)
   ->orwhere('gender' ,$request->pname)
   ->orwhere('father_name' ,$request->pname)
   ->orwhere('guard_no' ,$request->dname)
   ->paginate(5);
   return view ('vh_main_patients')->with('patients', $patients);
  }
}
