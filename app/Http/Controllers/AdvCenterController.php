<?php

namespace App\Http\Controllers;
use App\AdvCenter;
use App\Offdays;
use App\Centertiming;
use Illuminate\Http\Request;

class AdvCenterController extends Controller
{
  public function doctoradvcentersstore(Request $request) {
    $center = new AdvCenter;
    $center->cname = $request->cname;
    $center->address = $request->address;
    $center->doc_id = $request->doc_id;
    $current_doc_id = $center->doc_id;
    $center->active_status = '1';
    if ($request->has_receptionist) {
      $center->has_receptionist = $request->has_receptionist;
      $center->save();
      return view('docregform_recepsdetails')
      ->with('current_doc_id', $center->doc_id)
      ->with('center_id', $center->id);
    } else {
      $center->has_receptionist = "FALSE";
      $center->save();
      return redirect('showoffdaysforcenter/' . $current_doc_id . '/' . $center->id);
    }
  }

  public function addnewcenter($doc_id) {
    return view ('docregform_adv_centerdetails')->with('current_doc_id', $doc_id);
  }

  public function showcentersofcurdoc($id) {
    $centers = AdvCenter::where('doc_id', $id)
    ->where('active_status', '1')
    ->get();
    return view ('showcentersofcurdoc')->with('centers', $centers);
  }

  public function editingcenter($id) {
    $center = AdvCenter::find($id);
    $center_offdays = Offdays::where('center_id', $center->id)->get();
    $center_timings = Centertiming::where('center_id', $center->id)->get();
    return view ('editingcenter')->with('center', $center)
    ->with('center_offdays', $center_offdays)
    ->with('center_timings', $center_timings);
  }

  public function updatecenter($id, Request $request) {
    $center = AdvCenter::find($id);
    $center->cname = $request->cname;
    $center->address = $request->address;
    $center->doc_id = $center->doc_id;
    $current_state = $center->has_receptionist;
    if ($request->has_receptionist == "TRUE") {
    $center->has_receptionist = $request->has_receptionist;
    $center->save();
    //add receptionist
      if($request->has_receptionist == $current_state) {
        //return redirect ('showdoctors');
        $center = AdvCenter::find($id);
        return view ('editingcenter')->with('center', $center);
      } else {
        return view ('addrecepfromupdate')->with('current_doc_id', $center->doc_id)
        ->with('center_id', $center->id);
      }
    } else {
    $center->has_receptionist = "FALSE";
    }
    $center->save();
    $center = AdvCenter::find($id);
    return view ('editingcenter')->with('center', $center);
  }


    public function deletecenter($id) {
      $center = AdvCenter::find($id);
      $center->active_status = '0';
      $center->save();
      $centers = AdvCenter::where('doc_id', $id)->get();
      return view ('showcentersofcurdoc')->with('centers', $centers);
    }

    public function getseachedcenters(Request $request) {
      //echo $request;
      $centers = AdvCenter::where('cname' ,$request->cname)
      ->orwhere('qualification' ,$request->address)
      ->paginate(5);
      return view ('showcentersofcurdoc')->with('centers', $centers);
    }
}
