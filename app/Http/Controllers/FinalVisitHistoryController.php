<?php

namespace App\Http\Controllers;
use App\FinalVisitHistory;
use App\VisitHistory;
use Illuminate\Http\Request;

class FinalVisitHistoryController extends Controller
{
    public function store (Request $request) {
      $visit_history = new FinalVisitHistory;
      $visit_history->patient_id = $request->input('patient_id');
      $visit_history->date = $request->input('date');
      $visit_history->head_size = $request->input('head_size');
      $visit_history->length = $request->input('length');
      $visit_history->weight = $request->input('weight');
      $visit_history->temperature = $request->input('temperature');
      $visit_history->v_type = $request->input('v_type');
      $visit_history->medicine = $request->input('medicine');
      $visit_history->dosage = $request->input('dosage');
      $visit_history->note = $request->input('note');
      $visit_history->save();
}
}
