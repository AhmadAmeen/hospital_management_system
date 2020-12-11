<?php

namespace App\Http\Controllers;
use App\MedicinePotency;
use App\Centertiming;
use App\Patient;
use Illuminate\Http\Request;

class MedicinePotencyController extends Controller
{
    public function show ($med_id, Request $request) {
      //$patient = Patient::find($pat_id);
      $arr['data'] = MedicinePotency::where('med_id', $med_id)->get();
      echo json_encode($arr);
      exit;
    }
}
