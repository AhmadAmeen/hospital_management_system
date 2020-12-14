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

    public function docshow ($pat_id) {
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
      return view('docaddpatientmedhistory')
      ->with('patient', $patient)
      ->with('d_names', $d_names)
      ->with('d_desc', $d_desc);
    }

    public function patientmedhistorystore($pat_id, Request $request) {
     if($request->check) {
      for($i = 0; $i < count($request->check); $i++) {
        $j = $request->check[$i];
        $med_history = new MedicalHistory;
        $med_history->patient_id = $pat_id;
        $med_history->dname = $request->check1[$j];//($request->check[$i] == "TRUE") ? $request->status[$i] : 'FALSE';
        $med_history->disease_desc = $request->check2[$j];//($request->check[$i] == "TRUE") ? $request->status[$i] : 'FALSE';
        $med_history->status = 'TRUE';
        $med_history->save();
      }
      return redirect('vaccinehistoryview/' . $pat_id);
    } else {
      return redirect('addmedicalhistory/' . $pat_id);
    }

   }

   public function docpatientmedhistorystore($pat_id, Request $request) {
    if($request->check) {
     for($i = 0; $i < count($request->check); $i++) {
       $j = $request->check[$i];
       $med_history = new MedicalHistory;
       $med_history->patient_id = $pat_id;
       $med_history->dname = $request->check1[$j];//($request->check[$i] == "TRUE") ? $request->status[$i] : 'FALSE';
       $med_history->disease_desc = $request->check2[$j];//($request->check[$i] == "TRUE") ? $request->status[$i] : 'FALSE';
       $med_history->status = 'TRUE';
       $med_history->save();
     }
     return redirect('doc_edit_vh_from_pat/' . $pat_id);
   } else {
     return redirect('docaddmedicalhistory/' . $pat_id);
   }

  }

   public function editmedicalhistory ($pat_id) {
     $patient = Patient::find($pat_id);
     $med_histories = MedicalHistory::where('patient_id', $pat_id)->where('status', 'TRUE')->get();
     return view ('editmedicalhistory')->with('patient', $patient)->with('med_histories', $med_histories);
   }

   public function updatemedicalhistory($pat_id, Request $request) {
     $med_histories = MedicalHistory::where('patient_id', $pat_id)->get();
     $output = array_merge(array_diff($request->status, $request->prev_status), array_diff($request->prev_status, $request->status));
     if($output) {
      for ($i = 0; $i < count($output); $i++) {
            $med_history = MedicalHistory::find($output[$i]);
            $med_history->status = 'FALSE';
            $med_history->save();
         }
        }
      return redirect ('editmedicalhistory/' . $pat_id);
   }

  public function recep_updatemedicalhistory($pat_id, Request $request) {
    $med_histories = MedicalHistory::where('patient_id', $pat_id)->get();
    $output = array_merge(array_diff($request->status, $request->prev_status), array_diff($request->prev_status, $request->status));
    if($output) {
     for ($i = 0; $i < count($output); $i++) {
         $med_history = MedicalHistory::find($output[$i]);
         $med_history->status = 'FALSE';
         $med_history->save();
      }
     }
     return redirect ('recep_main_p_visit/' . $pat_id);
  }

  public function addmanualmedhistory($pat_id) {
     $patient = Patient::find($pat_id);
     return view ('addmanualmedhistory')->with('patient', $patient);
   }

   public function addmanualmedhistorystore($pat_id, Request $request) {
     $med_history = new MedicalHistory;
     $med_history->patient_id = $pat_id;
     $med_history->dname = $request->dname;
     $med_history->disease_desc = $request->disease_desc;
     $med_history->status = 'TRUE';
     $med_history->save();
     return redirect('addmanualmedhistory/' . $pat_id);
   }

  public function recep_addmanualmedhistorystore($pat_id, Request $request) {
    $med_history = new MedicalHistory;
    $med_history->patient_id = $pat_id;
    $med_history->dname = $request->dname;
    $med_history->disease_desc = $request->disease_desc;
    $med_history->status = 'TRUE';
    $med_history->save();
    return redirect('addmanualmedhistory/' . $pat_id);
  }

  public function mh_patient($pat_id) {
    $arr['data'] = MedicalHistory::where('patient_id', $pat_id)->get();
    echo json_encode($arr);
    exit;
  }

}
