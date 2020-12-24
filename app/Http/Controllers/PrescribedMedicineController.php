<?php

namespace App\Http\Controllers;
use App\PrescribedMedicine;
use Illuminate\Http\Request;

class PrescribedMedicineController extends Controller
{
  public function addprescribedmedicine(Request $request) {
    $vh_id = $request->input('vh_id');
    $med_id = $request->input('med_id');
    $dosage = $request->input('dosage');
    $dosage_urdu = $request->input('dosage_urdu');
    $pres_med = new PrescribedMedicine;
    $pres_med->vh_id = $vh_id;
    $pres_med->med_id = $med_id;
    $pres_med->dosage = $dosage;
    $pres_med->dosage_urdu = $dosage_urdu;
    $pres_med->save();
  }

  public function getmedicines($vh_id, Request $request) {
    $arr['data'] = PrescribedMedicine::where('vh_id', $vh_id)->get();
    echo json_encode($arr);
    exit;
  }

  public function removemedicines(Request $request) {
    $medicine = PrescribedMedicine::where('med_id', $request->input('medicine'))->latest()->first();
    $medicine->delete();
  }

}
