<?php

namespace App\Http\Controllers;
use App\VaccinationHistory;
use App\AdvVaccine;
use App\AdvVaccineTiming;
use App\Patient;
use Illuminate\Http\Request;

class VaccinationHistoryController extends Controller
{
  public function show ($pat_id)
  {
    try{
    $patient = Patient::find ($pat_id);
    $advvaccines = AdvVaccine::where ('doc_id', $patient->doc_id)->get();
    //print_r($advvaccines);
    foreach ($advvaccines as $advvaccine) {
      $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
      //echo $advvaccinetimings[0];
    }

    $v_timings = array (
      "Dosage I",
      "Dosage II",
      "Dosage III",
      "Dosage IV",
      "Dosage V",
      "Dosage VI",
      "Booster I",
      "Booster II",
    );

    return view ('vaccinehistoryview')
    ->with('patient', $patient)
    ->with('advvaccines', $advvaccines)
    ->with('v_timings', $v_timings)
    ->with('advvaccinetimings', $advvaccinetimings);
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
  }

  public function advvaccineforpatientupdatedoc($pat_id, Request $request) {
          $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
          $vid_to_dlt[]="";
          $vh[]="";
          foreach ($vaccinationhistories as $vaccinationhistory) {
            $vh[] = $vaccinationhistory->vt_id;
            $vid_to_dlt[] = $vaccinationhistory->id;
          }
          foreach ($vid_to_dlt as $vid) {
            $cur_vh = VaccinationHistory::find($vid);
            if($cur_vh) {
              $cur_vh->delete();
            }
          }
          //$diff = array_diff($vh, $request->vchecks);
          if($request->vchecks) {
            foreach ($request->vchecks as $vcheck) {
              $v_history = VaccinationHistory::firstOrNew(['pat_id' => $pat_id, 'vt_id' => $vcheck, 'status' => "TRUE"]);
              $v_history->save();
            }
          }
          return redirect('TodocMainPage/' . $pat_id);
        }

  public function advvaccineforpatientstore($pat_id ,Request $request) {
    try {
    foreach ($request->vchecks as $vcheck) {
      $v_history = new VaccinationHistory;
      $v_history->pat_id = $pat_id;
      $v_history->vt_id = $vcheck;
      $v_history->status = "TRUE";
      $v_history->save();
    }
    return redirect('patientregform/' . session('recep_session'));
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
  }

  public function editvaccinationhistory($pat_id ,Request $request) {
    try {
      $patient = Patient::find ($pat_id);
      $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
      $advvaccines = AdvVaccine::where ('doc_id', $patient->doc_id)->get();
      //print_r($advvaccines);
      foreach ($advvaccines as $advvaccine) {
        $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
        //echo $advvaccinetimings[0];
      }

      $v_timings = array (
        "Dosage I",
        "Dosage II",
        "Dosage III",
        "Dosage IV",
        "Dosage V",
        "Dosage VI",
        "Booster I",
        "Booster II",
      );

      return view ('editvaccinationhistory')
      ->with('patient', $patient)
      ->with('advvaccines', $advvaccines)
      ->with('v_timings', $v_timings)
      ->with('advvaccinetimings', $advvaccinetimings)
      ->with('vaccinationhistories', $vaccinationhistories);
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
  }

  public function editvaccinationhistorydoc($pat_id ,Request $request) {
      try {
        $patient = Patient::find ($pat_id);
        $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
        $advvaccines = AdvVaccine::where ('doc_id', $patient->doc_id)->get();
        //print_r($advvaccines);
        foreach ($advvaccines as $advvaccine) {
          $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
          //echo $advvaccinetimings[0];
        }

        $v_timings = array (
          "Dosage I",
          "Dosage II",
          "Dosage III",
          "Dosage IV",
          "Dosage V",
          "Dosage VI",
          "Booster I",
          "Booster II",
        );

        return view ('editvaccinationhistorydoc')
        ->with('patient', $patient)
        ->with('advvaccines', $advvaccines)
        ->with('v_timings', $v_timings)
        ->with('advvaccinetimings', $advvaccinetimings)
        ->with('vaccinationhistories', $vaccinationhistories);
      } catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
      }
    }

  public function advvaccineforpatientupdate($pat_id, Request $request) {
        $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
        $vid_to_dlt[]="";
        $vh[]="";
        foreach ($vaccinationhistories as $vaccinationhistory) {
          $vh[] = $vaccinationhistory->vt_id;
          $vid_to_dlt[] = $vaccinationhistory->id;
        }
        foreach ($vid_to_dlt as $vid) {
          $cur_vh = VaccinationHistory::find($vid);
          if($cur_vh) {
            $cur_vh->delete();
          }
        }
        //$diff = array_diff($vh, $request->vchecks);
        if($request->vchecks) {
          foreach ($request->vchecks as $vcheck) {
            $v_history = VaccinationHistory::firstOrNew(['pat_id' => $pat_id, 'vt_id' => $vcheck, 'status' => "TRUE"]);
            $v_history->save();
          }
        }
        return redirect('editvaccinationhistory/' . $pat_id);
      }



  public function recep_advvaccineforpatientupdate($pat_id, Request $request) {
    $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
    $vid_to_dlt[]="";
    $vh[]="";
    foreach ($vaccinationhistories as $vaccinationhistory) {
      $vh[] = $vaccinationhistory->vt_id;
      $vid_to_dlt[] = $vaccinationhistory->id;
    }
    foreach ($vid_to_dlt as $vid) {
      $cur_vh = VaccinationHistory::find($vid);
      if($cur_vh) {
        $cur_vh->delete();
      }
    }
    //$diff = array_diff($vh, $request->vchecks);
    if($request->vchecks) {
      foreach ($request->vchecks as $vcheck) {
        $v_history = VaccinationHistory::firstOrNew(['pat_id' => $pat_id, 'vt_id' => $vcheck, 'status' => "TRUE"]);
        $v_history->save();
      }
    }

    return redirect ('recep_main_p_visit/' . $pat_id);

  }
}
