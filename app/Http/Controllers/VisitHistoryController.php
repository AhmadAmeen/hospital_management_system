<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\VisitHistory;
use App\Patient;
use App\Doctor;
use App\Schedule;
use App\Receptionist;
use App\PrescribedMedicine;
use App\Diagnosis;
Use Session;
use Illuminate\Support\Facades\DB;

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

  public function specific_med_patient ($vh_id) {
    try{
      $results = DB::select( DB::raw("SELECT * FROM prescribed_medicines WHERE vh_id = '$vh_id'") );
      //$arr['data'] = PrescribedMedicine::where('vh_id', $vh_id)->get();
      $arr['data'] = $results;
      echo json_encode($arr);
      exit;
    }  catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
  }

  public function specific_diag_patient ($vh_id) {
    try{
      $arr['data'] = Diagnosis::where('vh_id', $vh_id)->get();
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
    $patient = Patient::find($id);
    $schedule = Schedule::where('pat_id', $patient->id)->where('status', '0')->latest()->first();
    $visit_history->doc_id = $patient->doc_id;
    $visit_history->fname = $patient->fname;
    $visit_history->lname = $patient->lname;
    $visit_history->gender = $patient->gender;
    $visit_history->age = $patient->age;
    $visit_history->dob = $patient->dob;
    $visit_history->father_name = $patient->father_name;
    $visit_history->guard_no = $patient->guard_no;
    $visit_history->date = $request->input('date');
    $visit_history->head_size = $request->input('head_size');
    $visit_history->length = $request->input('length');
    $visit_history->weight = $request->input('weight');
    $visit_history->note = "_";
    if ($request->input('temperature')) {
      $visit_history->temperature = $request->input('temperature');
    } else {
      $visit_history->temperature = "_";
    }
    $visit_history->other = $request->input('other');
    //double check
    $visit_history->center_id = $schedule->center_id;
    $visit_history->status = '1';
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
