<?php

namespace App\Http\Controllers;
use App\AdvOffdays;
use Illuminate\Http\Request;

class AdvOffdaysController extends Controller
{
    public function getCenterOffdays ($c_id) {
      $arr['data'] = AdvOffdays::where('center_id', $c_id)->get();
      echo json_encode($arr);
      exit;
    }
}
