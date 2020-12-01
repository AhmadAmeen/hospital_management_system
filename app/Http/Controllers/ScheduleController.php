<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Patient;
use App\Doctor;
use App\AdvCenter;
use App\Centertiming;
use App\CentertimingSlot;
use App\Offdays;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index (Request $request) {
     $c_id = $request->input('c_id');
     $pur_dayname = $request->input('pur_dayname');
     $pur_date = $request->input('pur_date');
     $today = $pur_date;
     $center = AdvCenter::find($c_id);
     $c_offdays = Offdays::where('center_id', $c_id)->get();
     $c_timings = Centertiming::where('center_id', $c_id)->get();
     $test = $pur_dayname;
     if ($c_offdays[0]->$pur_dayname == 'FALSE') {
       $result = "You will be scheduled on: <b>" . strtoupper($pur_dayname) . "</b><br> Date: <b>" . $pur_date . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
     } else {
       for ($i=0; $i < 14; $i++) {
         $repeat = strtotime("+1 day",strtotime($today));
         $today = date('d-m-Y',$repeat);
         $dayname = date('D', strtotime($today));
         $dayname = strtolower($dayname);
         $pur_date = $today;
         $pur_dayname = $dayname;
          if ($c_offdays[0]->$dayname == 'FALSE') {
            $result = "You will be scheduled on: <b>" . strtoupper($dayname) . "</b><br> Date: <b>" . $today . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
            return response()->json(array('result'=> $result, 'center_id'=> $center->id, 'pur_date'=> $pur_date, 'pur_dayname'=> $pur_dayname), 200);
          }
        //$today=$pur_date;
        }
      }
     return response()->json(array('result'=> $result, 'center_id'=> $center->id, 'pur_date'=> $pur_date, 'pur_dayname'=> $pur_dayname), 200);
    }

    public function getCenterTimings($cid) {
      $arr['data'] = Centertiming::where('center_id', $cid)->get();
      echo json_encode($arr);
      exit;
    }

    public function get_ct_slots($ct_id, Request $request) {
      //$arr['data'] = CentertimingSlot::where('ct_id', $ct_id)->where('status', '0')->get();
      $x = $request->input('final_purposed_date');

      $already_scheduled = Schedule::where('date', $x)->get();
      $scheduled_ids[] = "";
      if(!is_null($already_scheduled)) {
        foreach ($already_scheduled as $key) {
          // code...
          $scheduled_ids[] = $key->time;
        }
      } else {
        $scheduled_ids[] = "";
      }

      $arr['data'] = CentertimingSlot::where('ct_id', $ct_id)
      ->where('status', 0)
      ->whereNotIn('id', $scheduled_ids)
      ->get();
      echo json_encode($arr);
      exit;
    }

    public function show ($pat_id) {
      try {
      $patient = Patient::find($pat_id);
      $current_doc_id = $patient->doc_id;
      $current_center_id = $patient->center_id;
      $doctor = Doctor::find($current_doc_id);
      $centers = AdvCenter::where('doc_id', $current_doc_id)->get();
      return view ('scheduleview')->with('patient', $patient)
      ->with('doctor', $doctor)
      ->with('centers', $centers);
      } catch (Exception $exception) {
        return back()->withError($exception->getMessage())->withInput();
      }
    }

    public function schedulepatientstore(Request $request) {
      $schedule = new Schedule;
      $schedule->pat_id = $request->input('pat_id');
      $schedule->center_id = $request->input('center_id');
      $schedule->date = $request->input('date');
      $schedule->time = $request->input('time');
      //$ct_slot = CentertimingSlot::find($schedule->time);
      //$ct_slot->status = '1';
      //$ct_slot->save();
      $schedule->type = $request->input('type');
      $schedule->status = $request->input('status');
      $schedule->save();
    }
}
