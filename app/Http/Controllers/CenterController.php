<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\Doctor;
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

    public function showcentersofcurdoc($id) {
      $centers = Center::where('doc_id', $id)->get();
      return view ('showcentersofcurdoc')->with('centers', $centers);
    }


    public function editingcenter($id) {
      $center = Center::find($id);
      return view ('editingcenter')->with('center', $center);
    }

    public function updatecenter($id, Request $request) {
      $center = Center::find($id);
      //$doctor = Doctor::where('id', $id);
      $center->cname = $request->cname;
      $center->address = $request->address;
      $center->offdays = $request->offdays;
      $center->timing = $request->timing;
      $center->doc_id = $center->doc_id;
      //$center->has_receptionist = $request->has_receptionist;

      $current_state = $center->has_receptionist;
      if ($request->has_receptionist == "TRUE") {
      $center->has_receptionist = $request->has_receptionist;
      $center->save();
      //add receptionist
        if($request->has_receptionist == $current_state) {
          //return redirect ('showdoctors');
          $center = Center::find($id);
          return view ('editingcenter')->with('center', $center);
        } else {
          return view ('addrecepfromupdate')->with('current_doc_id', $center->doc_id)
          ->with('center_id', $center->id);
        }
      } else {
      $center->has_receptionist = "FALSE";
      }
      $center->save();
      //return redirect ('showdoctors');
      //return $this.showcentersofcurdoc($center->doc_id);
      $center = Center::find($id);
      return view ('editingcenter')->with('center', $center);
    }

    public function deletecenter($id) {
      $center = Center::find($id);
      $center->delete();
      //return redirect('showcentersofcurdoc/' . $id);
      $centers = Center::where('doc_id', $id)->get();
      return view ('showcentersofcurdoc')->with('centers', $centers);
    }
}
