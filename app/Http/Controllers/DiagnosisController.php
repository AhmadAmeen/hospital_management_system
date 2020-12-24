<?php

namespace App\Http\Controllers;
use App\Diagnosis;
use App\VisitHistory;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function adddiagnosis(Request $request) {
      $vh_id = $request->input('vh_id');
      $dis_id = $request->input('dis_id');
      $diagnosis = new Diagnosis;
      $diagnosis->vh_id = $vh_id;
      $diagnosis->dis_id = $dis_id;
      $diagnosis->save();
    }

    public function getdiagnosis($vh_id, Request $request) {
      $arr['data'] = Diagnosis::where('vh_id', $vh_id)->get();
      echo json_encode($arr);
      exit;
    }

    public function removediagnosis(Request $request) {
      $diagnosis = Diagnosis::where('dis_id', $request->input('diagnosis'))->latest()->first();
      $diagnosis->delete();
    }
}
