<?php

namespace App\Http\Controllers;
use App\Schedule;
use App\Patient;
use App\Doctor;
use App\AdvCenter;
use App\Centertiming;
use App\CentertimingSlot;
use App\Offdays;
use App\AdvOffdays;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;

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
     $adv_offdays = AdvOffdays::where('center_id', $c_id)->pluck('dayname')->all();
     if (!in_array($pur_dayname, $adv_offdays)) {
       $result = "You will be scheduled on: <b>" . strtoupper($pur_dayname) . "</b><br> Date: <b>" . $pur_date . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
     }
//     if ($c_offdays[0]->$pur_dayname == 'FALSE') {
//       $result = "You will be scheduled on: <b>" . strtoupper($pur_dayname) . "</b><br> Date: <b>" . $pur_date . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
//     }
    else {
       for ($i=0; $i < 21; $i++) {
         $repeat = strtotime("+1 day",strtotime($today));
         $today = date('d-m-Y',$repeat);
         $dayname = date('D', strtotime($today));
         $dayname = strtolower($dayname);
         $pur_date = $today;
         $pur_dayname = $dayname;
         if (!in_array($pur_dayname, $adv_offdays)) {
           $result = "You will be scheduled on: <b>" . strtoupper($dayname) . "</b><br> Date: <b>" . $today . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
           return response()->json(array('result'=> $result, 'center_id'=> $center->id, 'pur_date'=> $pur_date, 'pur_dayname'=> $pur_dayname), 200);
         }
//          if ($c_offdays[0]->$dayname == 'FALSE') {
//            $result = "You will be scheduled on: <b>" . strtoupper($dayname) . "</b><br> Date: <b>" . $today . "</b> <br> At the center: <b>" . $center->cname . "</b> <br> Please select the <b>center timing</b>, thank you!";
//            return response()->json(array('result'=> $result, 'center_id'=> $center->id, 'pur_date'=> $pur_date, 'pur_dayname'=> $pur_dayname), 200);
//          }
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
      $already_scheduled = Schedule::where('date', Carbon::parse($x))->get();
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

    public function showfordoc ($pat_id) {
      try {
      $patient = Patient::find($pat_id);
      $current_doc_id = $patient->doc_id;
      $current_center_id = $patient->center_id;
      $doctor = Doctor::find($current_doc_id);
      $centers = AdvCenter::where('doc_id', $current_doc_id)->get();
      return view ('docscheduleview')->with('patient', $patient)
      ->with('doctor', $doctor)
      ->with('centers', $centers);
      } catch (Exception $exception) {
        return back()->withError($exception->getMessage())->withInput();
      }
    }

    public function schedulepatientstore(Request $request) {
      $pat_id = $request->input('pat_id');
      $schedules = Schedule::where('pat_id', $pat_id)->get();
      //echo '<pre>'; print_r($schedules); echo '</pre>';
      //if (!$schedules) {
        $check_prev_schs = Schedule::where('pat_id', $pat_id)->get();
        if ($check_prev_schs) {
          foreach ($check_prev_schs as $check_prev_sch) {
            // code...
            $check_prev_sch->delete();
          }
        }
        $schedule = new Schedule;
        $schedule->pat_id = $request->input('pat_id');
        $schedule->center_id = $request->input('center_id');
        $schedule->date = Carbon::parse($request->input('date'))->format('Y-m-d')." 00:00:00";
        $schedule->time = $request->input('time');
        $schedule->type = $request->input('type');
        $schedule->status = $request->input('status');
        $doc_id = $request->session()->get('doctor_session');
        if ($doc_id) {
          $schedule->doc_id = $doc_id;
        } else {
          $recep_id = $request->session()->get('recep_session');
          $recep = Receptionist::find($recep_id);
          $schedule->doc_id = $recep->doc_id;
        }
        $schedule->save();
    }

    public function pat_rescheduled (Request $request) {
      $dateS = Carbon::parse($request->from)->format('Y-m-d')." 00:00:00";
      $dateE = Carbon::parse($request->to)->format('Y-m-d')." 00:00:00";
      if ($request->center_unavail == "All Centers") {
        $scheduled_pats = Schedule::where('status', 0)->whereBetween('date', [$dateS, $dateE])->get();
        //$scheduled_pats = Schedule::where('status', '0')->whereBetween('date',  [$request->from, $request->to])->get();
      } else {
        //$scheduled_pats = Schedule::where('center_id', $request->center_unavail)->where('status', 0)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
      }
      foreach ($scheduled_pats as $scheduled_pat) {
        $scheduled = Schedule::find($scheduled_pat->id);
        $new_schedule = new Schedule;
        $new_schedule->pat_id = $scheduled_pat->pat_id;
        $new_schedule->center_id = $scheduled_pat->center_id;
        $newdate = Carbon::parse($dateE)->addDays(1);//$dateE->addDays(1);
        $schDate = new Carbon($newdate);
        $center_offdays = AdvOffdays::where('center_id', $scheduled->center_id)->pluck('dayname')->all();
        for ($i = 0; $i < 21; $i++) {
          $newdate =Carbon::parse($schDate)->addDays($i);//$schDate->addDays($i);
          //check if that time slot and date
          //is already taken or not
          $checkSchDatetime = Schedule::where('time', $scheduled->time)->where('date', $newdate)->where('status', '0')->get();
          //echo '<pre>'; print_r($scheduled_pats); echo '</pre>';
          //echo '<pre>'; print_r($newdate . "|" . date('D', strtotime($newdate)) . "|" . $checkSchDatetime); echo '</pre>';
          if ($checkSchDatetime) {
            //new date to schedule
            //date('D', strtotime($date));
            //check if new date is an offday or not
            if (!in_array(date('D', strtotime($newdate)), $center_offdays))
            {
              $new_schedule->date = $newdate;
              $new_schedule->time = $scheduled->time;
              $new_schedule->type = $scheduled->type;
              $scheduled->status = "2";
              $scheduled->save();
              $new_schedule->status = '0';
              if ($doc_id) {
                $schedule->doc_id = $doc_id;
              } else {
                $recep_id = $request->session()->get('recep_session');
                $recep = Receptionist::find($recep_id);
                $schedule->doc_id = $recep->doc_id;
              }
              $new_schedule->save();
              break;
            }
          }
          $checkSchDatetime = "";
        }
      }
      $doc_id = $request->session()->get('doctor_session');
      return redirect ('docunavailable/'.$doc_id);
    }
}
