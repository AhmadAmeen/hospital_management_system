<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\VisitHistory;
use App\Patient;
use App\Doctor;
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
    try{
      $arr['data'] = VisitHistory::where('patient_id', $id)->get();
      //if (!$pvhistories) {
      //  return view ('addnewpatienthistory');
      //} else {
        //$patient = Patient::find($id);
        //return view ('vh_patient')->with('pvhistories', $pvhistories)
        //->with('patient', $patient);
        echo json_encode($arr);
        exit;
      //}
    }  catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
  }

  public function vh_and_patient ($id) {
        //$arr['data']  = Patient::find($id);
        $arr['data'] = VisitHistory::where('patient_id', $id)->latest()->first();
        //return response()->json(['arr1' => json_encode($arr1), 'arr2' => json_encode($arr2)]);
        echo json_encode($arr);
        exit;
      //}
  }

  public function specific_vh_patient ($vh_id) {
    try{
      $arr['data'] = VisitHistory::find($vh_id);
      echo json_encode($arr);
      exit;
    }  catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
  }

  public function addnewpvhhistory ($id) {
    return view ('addnewpvhhistory')->with('patient_id', $id);
  }

  public function addingpatientvh ($id, Request $request) {
    $visit_history = new VisitHistory;
    $visit_history->patient_id = $id;
    $visit_history->date = $request->input('date');
    $visit_history->head_size = $request->input('head_size');
    $visit_history->length = $request->input('length');
    $visit_history->weight = $request->input('weight');
    $visit_history->temperature = $request->input('temperature');
    $visit_history->other = $request->input('other');
    $visit_history->save();
    //return $this->vh_patient($id);
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
