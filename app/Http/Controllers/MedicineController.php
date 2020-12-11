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
}
