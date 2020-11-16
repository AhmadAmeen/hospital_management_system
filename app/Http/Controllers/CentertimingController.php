<?php

namespace App\Http\Controllers;
use App\Centertiming;
use App\AdvCenter;
use App\Doctor;
use Illuminate\Http\Request;

class CentertimingController extends Controller
{
    public function doctoradvcentertimingsstore(Request $request) {
      $centertiming = new Centertiming;
      $centertiming->center_id = $request->center_id;
      $centertiming->doc_id = $request->doc_id;
      $centertiming->from = $request->from;
      $centertiming->to = $request->to;
      $centertiming->save();
      $center = AdvCenter::find($request->center_id);
      return view('docregform_adv_center_timings')
      ->with('current_doc_id', $center->doc_id)
      ->with('center', $center);
    }

    public function editingcentertimings($center_id, Request $request) {
      $center_timings = Centertiming::where('center_id', $center_id)->get();
      $center = AdvCenter::find($request->center_id);
      return view('editingcentertimings')
      ->with('center_timings', $center_timings)
      ->with('center', $center);
    }

    public function updatecentertimings($center_id, Request $request) {
      $center_timings = Centertiming::where('center_id', $center_id)->get();
      for ($i = 0; $i < count($center_timings); $i++) {
        $centertiming = Centertiming::find($request->tid[$i]);
        $centertiming->from = $request->from[$i];
        $centertiming->to = $request->to[$i];
        $centertiming->save();
        }
      $center_timings = Centertiming::where('center_id', $center_id)->get();
        return view ('editingcentertimings')->with('center_timings', $center_timings);
        //return redirect (" url('editingcentertimings/' . $center_id) ");
    }

    public function deletecentertimings($centertiming_id) {
      $centertiming = Centertiming::find($centertiming_id);
      $center_id = $centertiming->center_id;
      $centertiming->delete();
      $center_timings = Centertiming::where('center_id', $center_id)->get();
        return view ('editingcentertimings')->with('center_timings', $center_timings);
        }

    public function addcentertimingfromupdate($center_id) {
      $center = AdvCenter::find($center_id);
      return view ('addcentertimingfromupdate')->with('center', $center)
      ->with('current_doc_id', $center->doc_id);
    }

    public function addingcentertimingfromupdate(Request $request) {
      $centertiming = new Centertiming;
      $centertiming->center_id = $request->center_id;
      $centertiming->doc_id = $request->doc_id;
      $centertiming->from = $request->from;
      $centertiming->to = $request->to;
      $centertiming->save();
      return redirect('editingcenter/' . $centertiming->center_id);
    }
}
