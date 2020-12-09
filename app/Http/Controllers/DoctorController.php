<?php

namespace App\Http\Controllers;
use Illuminate\Facades\Response;
use Illuminate\Http\Request;
use App\Receptionist;
use App\Patient;
use App\Doctor;
use App\AdvCenter;
use App\Schedule;
use App\MedicalHistory;
use App\VaccinationHistory;
use App\AdvVaccine;
use App\VisitHistory;
use App\Medicine;
use App\AdvVaccineTiming;

use Validator;
use Image;
use Session;

class DoctorController extends Controller
{
  public function doctorlogin() {
    return view('doctorlogin');
  }

  public function getdoctorlogout() {
    Session::flush();
    return redirect('/');
  }

    public function docMainPage($pat_id, Request $request) {

      $cur_pat_vh = VisitHistory::where('patient_id', $pat_id)->latest()->first();
      //find all visit histories
      $v_histories = VisitHistory::get();
      //$incoming_patients = "";
      foreach ($v_histories as $v_history) {
        //find patient with each of that visit history
        $patient = Patient::find($v_history->patient_id);
        $doc_id = $request->session()->get('doctor_session');
        // check if he's the patient of current doc
        if($patient->doc_id == $doc_id) {
          //if so send him and his history to the doc
          $patients[] = $patient;
          //$visit_details = $v_history;
        }
      }
      $medicines = Medicine::get();
      //echo '<pre>'; print_r($incoming_patients); echo '</pre>';
      //echo json_encode($arr);
      //exit;

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

      $patient = Patient::find($pat_id);
      $advvaccines = AdvVaccine::where ('doc_id', $patient->doc_id)->get();
      //print_r($advvaccines);
      foreach ($advvaccines as $advvaccine) {
        $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
        //echo $advvaccinetimings[0];
      }

      $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
      return view('doctormainpage')->with('patients', $patients)
      ->with('medicines', $medicines)
      ->with('v_timings', $v_timings)
      ->with('advvaccines', $advvaccines)
      ->with('currentpatient', $patient)
      ->with('vaccinationhistories', $vaccinationhistories)
      ->with('cur_pat_vh', $cur_pat_vh);
    }

    public function doctorloggedin(Request $request) {
        $doctor = Doctor::where('username',$request->username)->where('password',$request->password)
        ->get()
        ->toArray();
        if ($doctor) {
          $request->session()->put('doctor_session', $doctor[0]['id']);
          $request->session()->put('doctor_name_session', $request->username);
          //find all visit histories
          $v_histories = VisitHistory::get();
          //$incoming_patients = "";
          foreach ($v_histories as $v_history) {
            //find patient with each of that visit history
            $patient = Patient::find($v_history->patient_id);
            $doc_id = $doctor[0]['id'];
            // check if he's the patient of current doc
            if($patient->doc_id == $doc_id) {
              //if so send him and his history to the doc
              $patients[] = $patient;
              //$visit_details = $v_history;
            }
          }
          $medicines = Medicine::get();
          //echo '<pre>'; print_r($incoming_patients); echo '</pre>';
          //echo json_encode($arr);
          //exit;

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

          $patient = Patient::find(6);
          $advvaccines = AdvVaccine::where ('doc_id', $patient->doc_id)->get();
          //print_r($advvaccines);
          foreach ($advvaccines as $advvaccine) {
            $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
            //echo $advvaccinetimings[0];
          }

          $vaccinationhistories = VaccinationHistory::where('pat_id', 6)->get();
          return view('doctormainpage')->with('patients', $patients)
          ->with('medicines', $medicines)
          ->with('v_timings', $v_timings)
          ->with('advvaccines', $advvaccines)
          ->with('patient', $patient)
          ->with('vaccinationhistories', $vaccinationhistories);//->with('visit_details', $visit_details);
        } else {
          session::flash('coc', 'Email or Password is incorrect!');
          return redirect('doctorlogin')->withinput();
        }
      }

    public function show() {
      return view ('docregform_docdetails');
    }

    public function doctorstore(Request $request) {
      $request->validate([
          'username' => 'unique:doctors,username',
          'password' => 'min:6',
      ]);
      $doctor = new Doctor;
      $image_file = $request->file('dimg');
      $image_resize = Image::make($image_file)->resize(150, 150)->encode('jpg');
      $doctor->dimg = $image_resize;
      $doctor->dname = $request->dname;
      $doctor->qualification = $request->qualification;
      $doctor->phno = $request->phno;
      $doctor->email = $request->email;
      $doctor->username = $request->username;
      $doctor->password = $request->password;
      $doctor->active_status = "1";
      $doctor->save();
      return view ('docregform_adv_centerdetails')->with('current_doc_id', $doctor->id);
    }

    public function showdoctors() {
      $doctors = Doctor::where('active_status', '1')->paginate(5);
      return view ('showdoctors')->with('doctors', $doctors);
    }

    public function editingdoctor($id) {
      $doctor = Doctor::find($id);
      return view ('editingdoctor')->with('doctor', $doctor);
    }

    public function updatedoctor($id, Request $request) {
      $doctor = Doctor::find($id);
      if($request->file('dimg')) {
        $image_file = $request->file('dimg');
        $image_resize = Image::make($image_file)->resize(150, 150)->encode('jpg');
        $doctor->dimg = $image_resize;
      }
      $doctor->dname = $request->dname;
      $doctor->qualification = $request->qualification;
      $doctor->phno = $request->phno;
      $doctor->email = $request->email;
      $doctor->username = $request->username;
      $doctor->password = $request->password;
      //active status
      //$doctor->active_status = '1';
      $doctor->save();
      return redirect ('showdoctors');
    }

    public function deletedoctor($id) {
      $doctor = Doctor::find($id);
      $doctor->active_status = '0';
      $doctor->save();
      return redirect('showdoctors');
    }

   public function getseacheddoctors(Request $request) {
     $doctors = Doctor::where('dname' ,$request->dname)
     ->orwhere('qualification' ,$request->dname)
     ->orwhere('phno' ,$request->dname)
     ->orwhere('email' ,$request->dname)
     ->orwhere('username' ,$request->dname)
     ->paginate(5);
     return view ('showdoctors')->with('doctors', $doctors);
   }
}
