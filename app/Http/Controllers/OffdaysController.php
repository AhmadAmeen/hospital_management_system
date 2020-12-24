<?php

namespace App\Http\Controllers;
use App\Offdays;
use App\AdvOffdays;
use App\AdvCenter;
use Illuminate\Http\Request;

class OffdaysController extends Controller
{
    public function showoffdaysforcenter ($doc_id, $center_id) {
      //create days array
      $center = AdvCenter::find($center_id);
      $week_days = array (
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thrusday',
        'Friday',
        'Sat',
        'Sun'
      );
      $db_days_names = array (
        'mon',
        'tues',
        'wed',
        'thu',
        'fri',
        'sat',
        'sun'
      );
      return view ('docregform_adv_centeroffdays')->with('current_doc_id', $doc_id)
      ->with('center', $center)
      ->with('week_days', $week_days)
      ->with('db_days_names', $db_days_names);
    }

    public function doctoradvcenteroffdaysstore(Request $request) {
      $offdays = new Offdays;
      $offdays->center_id = $request->center_id;
      $center = AdvCenter::find($request->center_id);
      $offdays->doc_id = $request->doc_id;
      $offdays->mon = ($request->mon == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->tues = ($request->tues == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->wed = ($request->wed == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->thu = ($request->thu == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->fri = ($request->fri == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->sat = ($request->sat == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->sun = ($request->sun == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays->save();

      if ($request->mon == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id; $advoffdays->dayname = "Mon"; $advoffdays->status = "TRUE";
      }
      if ($request->tues == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id;  $advoffdays->dayname = "Tue"; $advoffdays->status = "TRUE";
      }
      if ($request->wed == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id;  $advoffdays->dayname = "Wed"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->thu == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id;  $advoffdays->dayname = "Thu"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->fri == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id;  $advoffdays->dayname = "Fri"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->sat == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id;  $advoffdays->dayname = "Sat"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->sun == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $request->center_id;  $advoffdays->dayname = "Sun"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }

      return view('docregform_adv_center_timings')
      ->with('current_doc_id', $center->doc_id)
      ->with('center', $center);
    }

    public function editingcenteroffdays($center_id) {
      $center_offdays = Offdays::where('center_id', $center_id)->get();
      $center = AdvCenter::find($center_id);
      return view ('editingcenteroffdays')
      ->with('center_offdays', $center_offdays)
      ->with('center', $center);
    }

    public function updatecenteroffdays($center_id, Request $request) {
      $offdays = Offdays::where('center_id', $center_id)->get();

      $offdays[0]->center_id = $center_id;
      $center = AdvCenter::find($center_id);
      $offdays[0]->doc_id = $center->doc_id;
      $offdays[0]->mon = ($request->mon == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->tues = ($request->tues == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->wed = ($request->wed == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->thu = ($request->thu == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->fri = ($request->fri == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->sat = ($request->sat == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->sun = ($request->sun == "TRUE") ? 'TRUE' : 'FALSE';
      $offdays[0]->save();

      $advoffdays = AdvOffdays::where('center_id', $center_id)->get();
      foreach ($advoffdays as $advoffday) {
        $advoffday->delete();
      }

      if ($request->mon == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id; $advoffdays->dayname = "Mon"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->tues == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id;  $advoffdays->dayname = "Tue"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->wed == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id;  $advoffdays->dayname = "Wed"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->thu == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id;  $advoffdays->dayname = "Thu"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->fri == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id;  $advoffdays->dayname = "Fri"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->sat == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id;  $advoffdays->dayname = "Sat"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }
      if ($request->sun == "TRUE") {
       $advoffdays = new AdvOffdays; $advoffdays->center_id = $center_id;  $advoffdays->dayname = "Sun"; $advoffdays->status = "TRUE"; $advoffdays->save();
      }

      return redirect('editingcenter/' . $center_id);
    }
}
