<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Patient;
use App\Doctor;
use App\AdvCenter;
use App\Centertiming;
use App\Offdays;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index (Request $request) {
     $c_id = $request->input('c_id');
     $pur_dayname = $request->input('pur_dayname');
     $pur_date = $request->input('pur_date');
     $center = AdvCenter::find($c_id);
     $c_offdays = Offdays::where('center_id', $c_id)->get();
     $c_timings = Centertiming::where('center_id', $c_id)->get();

     if ($c_offdays[0]->$pur_dayname == 'TRUE') {
       $result = "You will be scheduled on: <b>" . strtoupper($pur_dayname) . "</b><br> Date: <b>" . $pur_date . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
     }
     /*
     else {
       foreach ($c_offdays[0] as $key) {
         if($key == 'TRUE') {
           $result = "You will be scheduled on: <b>" . strtoupper($pur_dayname) . "</b><br> Date: <b>" . $pur_date . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
           break;
        }
      }*/
     }

     return response()->json(array('result'=> $result, 'center_id'=> $center->id), 200);
    }

     public function getCenterTimings($cid) {
       $arr['data'] = Centertiming::where('center_id', $cid)->get();
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
      $schedule->type = $request->input('type');
      $schedule->status = $request->input('status');
      $schedule->save();
      error_log($schedule);
    }
}
