<?php

namespace App\Http\Controllers;
use App\Centertiming;
use App\CentertimingSlot;
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

      $starttime = $request->from;  // your start time
      $endtime = $request->to;  // End time
      $duration = '15';  // split by 30 mins

      $array_of_time = array ();
      $start_time    = strtotime ($starttime); //change to strtotime
      $end_time      = strtotime ($endtime); //change to strtotime

      $add_mins  = $duration * 60;

      while ($start_time <= $end_time) // loop between time
      {
         $array_of_time[] = date ("h:i", $start_time);
         $ct_slot = new CentertimingSlot;
         $ct_slot->ct_id = $centertiming->id;
         $ct_slot->from = date ("h:i", $start_time);
         $start_time += $add_mins; // to check endtie=me
         $ct_slot->to = date ("h:i", $start_time);
         $ct_slot->status = '0';
         if ($end_time >= $start_time) {
           $ct_slot->save();
         }
      }

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

        //update c_timing slots here for current center timing which we are updating
          $starttime = $centertiming->from;  // your start time
          $endtime = $centertiming->to;  // End time
          $duration = '15';  // split by 30 mins
          //we will give status 1 of prev slots, we won't delete them rather just change the status
          //we will get only status 0 slots in schedules
          //it will allow us to differntiate between updated and previous slots
          //as updated slots will have status 1 and new 0
          $prev_ct_slots = CentertimingSlot::where('ct_id', $centertiming->id)->get();
          foreach ($prev_ct_slots as $prev_ct_slot) {
            // code...
            $prev_ct_slot->status = 1;
            $prev_ct_slot->save();
          }

          $array_of_time = array ();
          $start_time    = strtotime ($starttime); //change to strtotime
          $end_time      = strtotime ($endtime); //change to strtotime

          $add_mins  = $duration * 60;

          while ($start_time <= $end_time) // loop between time
          {
             $array_of_time[] = date ("h:i", $start_time);
             $ct_slot = new CentertimingSlot;
             $ct_slot->ct_id = $centertiming->id;
             $ct_slot->from = date ("h:i", $start_time);
             $start_time += $add_mins; // to check endtie=me
             $ct_slot->to = date ("h:i", $start_time);
             $ct_slot->status = '0';
             if ($end_time >= $start_time) {
               $ct_slot->save();
             }
          }
        //end updating slots

        $centertiming->save();
        }


      $center_timings = Centertiming::where('center_id', $center_id)->get();
        return view ('editingcentertimings')->with('center_timings', $center_timings);
        //return redirect (" url('editingcentertimings/' . $center_id) ");
    }

    public function deletecentertimings($centertiming_id) {
      $centertiming = Centertiming::find($centertiming_id);
      $center_id = $centertiming->center_id;
      //delete the c_timing slots
      $ct_slots = CentertimingSlot::where('ct_id', $centertiming->id)->get();
      foreach ($ct_slots as $ct_slot) {
        // code...
        //$ct_slot->delete();
      }
      //$centertiming->delete();
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
