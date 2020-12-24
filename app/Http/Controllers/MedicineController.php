<?php

namespace App\Http\Controllers;
use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function getmedicine ($med_id) {
      $arr['data'] = Medicine::find($med_id);
      echo json_encode($arr);
      exit;
    }

    public function addnewmedicine(Request $request) {
      $medicine = new Medicine;
      $medicine->name = $request->input('med_name');
      $medicine->desc = "_";
      $medicine->type = $request->input('med_type');
      $medicine->save();
    }
}
