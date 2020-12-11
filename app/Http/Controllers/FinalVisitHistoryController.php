<?php

namespace App\Http\Controllers;
use App\FinalVisitHistory;
use App\VisitHistory;
use Illuminate\Http\Request;

class FinalVisitHistoryController extends Controller
{
    public function store (Request $request) {
      $f_visit_history = new FinalVisitHistory;
      $f_visit_history->patient_id = $request->input('patient_id');
      $f_visit_history->date = $request->input('date');
      $f_visit_history->head_size = $request->input('head_size');
      $f_visit_history->length = $request->input('length');
      $f_visit_history->weight = $request->input('weight');
      $f_visit_history->temperature = $request->input('temperature');
      $f_visit_history->v_type = $request->input('v_type');
      //$request->input('medicine')
      $f_visit_history->medicine = "Demo Medicine";
      //$request->input('dosage')
      $f_visit_history->dosage = "Dosage";
      if ($request->input('note')) {
        $f_visit_history->note = $request->input('note');
      } else {
        $f_visit_history->note = "_";
      }
      $f_visit_history->save();
      $deleting_tvh = VisitHistory::where('patient_id', $request->input('patient_id'))->latest()->first();
      $deleting_tvh->delete();
    }

    public function patient_fvh_record($pat_id, Request $request) {
      $arr['data'] = FinalVisitHistory::where('patient_id', $pat_id)->get();
      echo json_encode($arr);
      exit;
    }

}
