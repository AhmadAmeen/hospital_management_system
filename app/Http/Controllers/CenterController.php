<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use Session;

class CenterController extends Controller
{
    public function doctorcentersstore(Request $request) {
      $center = new Center;
      $center->cname = $request->cname;
      $center->address = $request->address;
      $center->offdays = $request->offdays;
      $center->timing = $request->timing;
      $center->doc_id = $request->doc_id;
      if ($request->has_receptionist) {
        $center->has_receptionist = $request->has_receptionist;
        $center->save();
        return view('docregform_recepsdetails')
        ->with('current_doc_id', $center->doc_id)
        ->with('center_id', $center->id);
      } else {
        $center->has_receptionist = "FALSE";
        $center->save();
        return view('docregform_centersdetails')->with('current_doc_id', $center->doc_id);
      }
      //$center->has_receptionist = $request->has_receptionist;
      //if ($request->submit != 'vaccine') {
      //
      //} else {
      //  return view('docregform_vaccinedetails');
      //}
    }
}
