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
use App\Diagnosis;
use App\Disease;
use App\PrescribedMedicine;
use App\AdvVaccineTiming;
use Validator;
use Image;
use Session;
use Carbon\Carbon;

class DoctorController extends Controller

{

    public function drWebsite($dweb) {
      $doctor = Doctor::where('username', $dweb)->latest()->first();
      if($doctor) {
        return view ('DrRazaKareem')->with('doctor', $doctor)->with('images', $doctor->dimg);
      }
    }

    public function doctorlogin() {
      return view('doctorlogin');
    }

    public function getdoctorlogout() {
      Session::flush();
      return redirect('/');
    }

    public function fetch_tvh_records(Request $request) {
      $vhPatIds = VisitHistory::pluck('patient_id')->all();
      $doc_id = $request->session()->get('doctor_session');
      $arr['data'] = VisitHistory::where('doc_id', $doc_id)->get();
      echo json_encode($arr);
      exit;
    }

    public function getTypeOfVisit($pat_id, Request $request) {
      $arr['data'] = VisitHistory::select('other')->where('patient_id', $pat_id)->latest()->first();
      echo json_encode($arr);
      exit;
    }

    public function TodocMainPage($pat_id, Request $request) {
      $med_histories = MedicalHistory::where('patient_id', $pat_id)->get();
      //public function docMainPage($pat_id, Request $request) {
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
      $medicine_names = Medicine::pluck('name')->all();
      $diseases = Disease::get();
      $disease_names = Disease::pluck('name')->all();
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

      //$patient = Patient::find($pat_id);
      $advvaccines = AdvVaccine::where ('doc_id', $doc_id)->get();
      //print_r($advvaccines);
      foreach ($advvaccines as $advvaccine) {
        $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
        //echo $advvaccinetimings[0];
      }

      $vaccinationhistories = VaccinationHistory::where('pat_id', $pat_id)->get();
      return view('doctormainpage')//->with('patients', $patients)
      ->with('medicines', $medicines)
      ->with('medicine_names', $medicine_names)
      ->with('diseases', $diseases)
      ->with('disease_names', $disease_names)
      ->with('v_timings', $v_timings)
      ->with('advvaccines', $advvaccines)
      ->with('currentpatient', $patient)
      ->with('vaccinationhistories', $vaccinationhistories)
      ->with('cur_pat_vh', $cur_pat_vh)
      ->with('med_histories', $med_histories);
    }

    public function prescribeMed(Request $request) {
      return view('doctormainpage');
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
          $medicine_names = Medicine::pluck('name')->all();
          $diseases = Disease::get();
          $disease_names = Disease::pluck('name')->all();
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

          //$patient = Patient::find(6);
          $advvaccines = AdvVaccine::where ('doc_id', $doctor[0]['id'])->get();
          //print_r($advvaccines);
          foreach ($advvaccines as $advvaccine) {
            $advvaccinetimings = AdvVaccineTiming::where('v_id', $advvaccine->id)->get();
            //echo $advvaccinetimings[0];
          }

          $vaccinationhistories = VaccinationHistory::where('pat_id', 6)->get();
          return view('doctormainpage')//
          //->with('patients', $patients)
          ->with('medicines', $medicines)
          ->with('medicine_names', $medicine_names)
          ->with('diseases', $diseases)
          ->with('disease_names', $disease_names)
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

    public function doc_adv_center_add($doc_id, Request $request) {
      return view ('doc_adv_center_add')->with('current_doc_id', $doc_id);
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

   public function docunavailable ($doc_id, Request $request) {
     $centers = AdvCenter::where("doc_id", $doc_id)->get();
     return view ('docunavailable')->with('centers', $centers);
   }

   public function showdashboard($doc_id, Request $request) {

     //current month data
     $patients = Patient::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $males = Patient::where('doc_id', $doc_id)->where('gender', 'MALE')
     ->whereYear('created_at', Carbon::now()->year)
      ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $females = Patient::where('doc_id', $doc_id)->where('gender', 'FEMALE')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $activepatients = Patient::where('doc_id', $doc_id)->where('status', '1')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $visit_histories = VisitHistory::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $centers = AdvCenter::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $center_ids = AdvCenter::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->pluck('id')->all();

     $schedules = Schedule::whereIn('center_id', $center_ids)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $sch_vac = Schedule::where('type', 'Vaccination')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $sch_checkup = Schedule::where('type', 'Physical Checkup')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();

     $sch_vid = Schedule::where('type', 'Video Consultation')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->month)
     ->get();
     //current month data taken

     //last month data
     $patientslm = Patient::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $patienschange = $this->getPercentageChange(count($patients), count($patientslm));

     $maleslm = Patient::where('doc_id', $doc_id)->where('gender', 'MALE')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $maleschange = $this->getPercentageChange(count($males), count($maleslm));

     $femaleslm = Patient::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $femaleschange = $this->getPercentageChange(count($females), count($femaleslm));

     $activepatientslm = Patient::where('doc_id', $doc_id)->where('status', '1')
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $activepatientschange = $this->getPercentageChange(count($activepatients), count($activepatientslm));

     $visit_historieslm = VisitHistory::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $visit_historieschange = $this->getPercentageChange(count($visit_histories), count($visit_historieslm));

     $centerslm = AdvCenter::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $centerschange = $this->getPercentageChange(count($centers), count($centerslm));

     $center_idslm = AdvCenter::where('doc_id', $doc_id)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->pluck('id')->all();

     //$center_idschange = $this->getPercentageChange(count($center_ids), count($center_idslm));

     $scheduleslm = Schedule::whereIn('center_id', $center_ids)
     ->whereYear('created_at', Carbon::now()->year)
     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
     ->get();

     $scheduleschange = $this->getPercentageChange(count($schedules), count($scheduleslm));

     //last month data taken

     return view ('showdashboard')
     ->with('patients', $patients)
     ->with('males', $males)
     ->with('females', $females)
     ->with('activepatients', $activepatients)
     ->with('centers', $centers)
     ->with('visit_histories', $visit_histories)
     ->with('schedules', $schedules)
     ->with('sch_vac', $sch_vac)
     ->with('sch_checkup', $sch_checkup)
     ->with('sch_vid', $sch_vid)
     ->with('patienschange', $patienschange)
     ->with('maleschange', $maleschange)
     ->with('femaleschange', $femaleschange)
     ->with('visit_historieschange', $visit_historieschange)
     ->with('scheduleschange', $scheduleschange);
   }

   public function updatedashboard($from, $to, Request $request) {

          $doc_id = $request->session()->get('doctor_session');
          $dateS = new Carbon($from);
          $dateE = new Carbon($to);
          $patients = Patient::where('doc_id', $doc_id)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();

          //current month data
  //        $patients = Patient::where('doc_id', $doc_id)
//          ->whereYear('created_at', Carbon::now()->year)
//          ->whereMonth('created_at', Carbon::now()->month)
//          ->get();

          //$males = Patient::where('doc_id', $doc_id)->where('gender', 'MALE')
          //->whereYear('created_at', Carbon::now()->year)
          // ->whereMonth('created_at', Carbon::now()->month)
          //->get();
          $males = Patient::where('doc_id', $doc_id)->where('gender', 'MALE')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();

          $females = Patient::where('doc_id', $doc_id)->where('gender', 'FEMALE')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$females = Patient::where('doc_id', $doc_id)->where('gender', 'FEMALE')
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $activepatients = Patient::where('doc_id', $doc_id)->where('status', '1')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$activepatients = Patient::where('doc_id', $doc_id)->where('status', '1')
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $visit_histories = VisitHistory::where('doc_id', $doc_id)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$visit_histories = VisitHistory::where('doc_id', $doc_id)
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $centers = AdvCenter::where('doc_id', $doc_id)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$centers = AdvCenter::where('doc_id', $doc_id)
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $center_ids = AdvCenter::where('doc_id', $doc_id)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->pluck('id')->all();
          //$center_ids = AdvCenter::where('doc_id', $doc_id)
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->pluck('id')->all();

          $schedules = Schedule::whereIn('center_id', $center_ids)->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$schedules = Schedule::whereIn('center_id', $center_ids)
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $sch_vac = Schedule::where('type', 'Vaccination')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$sch_vac = Schedule::where('type', 'Vaccination')
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $sch_checkup = Schedule::where('type', 'Physical Checkup')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$sch_checkup = Schedule::where('type', 'Physical Checkup')
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();

          $sch_vid = Schedule::where('type', 'Video Consultation')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->get();
          //$sch_vid = Schedule::where('type', 'Video Consultation')
          //->whereYear('created_at', Carbon::now()->year)
          //->whereMonth('created_at', Carbon::now()->month)
          //->get();
          //current month data taken

          //last month data
          $patientslm = Patient::where('doc_id', $doc_id)
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $patienschange = $this->getPercentageChange(count($patients), count($patientslm));

          $maleslm = Patient::where('doc_id', $doc_id)->where('gender', 'MALE')
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $maleschange = $this->getPercentageChange(count($males), count($maleslm));

          $femaleslm = Patient::where('doc_id', $doc_id)
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $femaleschange = $this->getPercentageChange(count($females), count($femaleslm));

          $activepatientslm = Patient::where('doc_id', $doc_id)->where('status', '1')
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $activepatientschange = $this->getPercentageChange(count($activepatients), count($activepatientslm));

          $visit_historieslm = VisitHistory::where('doc_id', $doc_id)
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $visit_historieschange = $this->getPercentageChange(count($visit_histories), count($visit_historieslm));

          $centerslm = AdvCenter::where('doc_id', $doc_id)
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $centerschange = $this->getPercentageChange(count($centers), count($centerslm));

          $center_idslm = AdvCenter::where('doc_id', $doc_id)
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->pluck('id')->all();

          //$center_idschange = $this->getPercentageChange(count($center_ids), count($center_idslm));

          $scheduleslm = Schedule::whereIn('center_id', $center_ids)
          ->whereYear('created_at', Carbon::now()->year)
          ->whereMonth('created_at', Carbon::now()->subMonth()->month)
          ->get();

          $scheduleschange = $this->getPercentageChange(count($schedules), count($scheduleslm));

          //last month data taken

          return view ('showdashboard')
          ->with('patients', $patients)
          ->with('males', $males)
          ->with('females', $females)
          ->with('activepatients', $activepatients)
          ->with('centers', $centers)
          ->with('visit_histories', $visit_histories)
          ->with('schedules', $schedules)
          ->with('sch_vac', $sch_vac)
          ->with('sch_checkup', $sch_checkup)
          ->with('sch_vid', $sch_vid)
          ->with('patienschange', $patienschange)
          ->with('maleschange', $maleschange)
          ->with('femaleschange', $femaleschange)
          ->with('visit_historieschange', $visit_historieschange)
          ->with('scheduleschange', $scheduleschange);
        }

   function getPercentageChange($oldNumber, $newNumber){
    if ($oldNumber == 0) {
      return 0;
    } else {
      $decreaseValue = $oldNumber - $newNumber;
      return ($decreaseValue / $oldNumber) * 100;
    }
  }

  public function showPrescription($vh_id, $note, Request $request) {
    $visit_history = VisitHistory::find($vh_id);
    $visited_center = AdvCenter::find($visit_history->center_id);
    $visit_history->note = $note;
    $visit_history->save();
    $patient = Patient::find($visit_history->patient_id);
    $doctor = Doctor::find($visit_history->doc_id);
    $centers = AdvCenter::where('doc_id', $doctor->id)->get();
    $diagnoses = Diagnosis::where('vh_id', $vh_id)->get();
    $prescribed_med = PrescribedMedicine::where('vh_id', $vh_id)->get();
    return view ('showPrescription')
    ->with('visit_history', $visit_history)
    ->with('patient', $patient)
    ->with('doctor', $doctor)
    ->with('visited_cname', $visited_center->cname)
    ->with('centers', $centers)
    ->with('diagnoses', $diagnoses)
    ->with('prescribed_med', $prescribed_med);
  }

  public function removePatFromList($vh_id, Request $request) {
    $visit_history = VisitHistory::find($vh_id);
    $visited_center = AdvCenter::find($visit_history->center_id);
    $visit_history->status = '0';
    $visit_history->save();
    $patient = Patient::find($visit_history->patient_id);
    $doctor = Doctor::find($visit_history->doc_id);
    $centers = AdvCenter::where('doc_id', $doctor->id)->get();
    $diagnoses = Diagnosis::where('vh_id', $vh_id)->get();
    $prescribed_med = PrescribedMedicine::where('vh_id', $vh_id)->get();
    return view ('showPrescription')
    ->with('visit_history', $visit_history)
    ->with('patient', $patient)
    ->with('doctor', $doctor)
    ->with('visited_cname', $visited_center->cname)
    ->with('centers', $centers)
    ->with('diagnoses', $diagnoses)
    ->with('prescribed_med', $prescribed_med);
  }

  public function patDetailedDashboard($pat_id, $vh_id, Request $request) {
    $visit_history = VisitHistory::find($vh_id);
    $visit_histories = VisitHistory::where('patient_id', $pat_id)->get();
    $visit_histories_ids = VisitHistory::where('patient_id', $pat_id)->pluck('id')->all();
    $patient = Patient::find($pat_id);
    $doctor = Doctor::find($patient->doc_id);
    $centers = AdvCenter::where('doc_id', $doctor->id)->get();
    $diagnoses = Diagnosis::where('vh_id', $vh_id)->get();
    $diagnoses_alltime = Diagnosis::where('vh_id', $visit_histories_ids)->pluck('dis_id')->all();
    $p_meds_alltime = PrescribedMedicine::where('vh_id', $visit_histories_ids)->pluck('med_id')->all();
    $prescribed_meds = PrescribedMedicine::where('vh_id', $vh_id)->get();
    $medical_histories = MedicalHistory::where('patient_id', $pat_id)->get();
    $vacc_histories_t = VaccinationHistory::where('pat_id', $pat_id)->where('status', 'TRUE')->get();
    //$vaccines_t  = AdvVaccineTiming::where('id', $vacc_histories_t)->get()
    $vacc_histories_f = VaccinationHistory::where('pat_id', $pat_id)->where('status', 'FALSE')->get();
    //$arr = 4;
    $arrayMedName = array();
    $arrayDiagName = array();
    $background_colors = array('#282E33', '#25373A', '#164852', '#495E67', '#b90000', '#FF3838', '#8338bd');

    foreach ($prescribed_meds as $prescribed_med) {
      $rand_background = $background_colors[array_rand($background_colors)];
      array_push($arrayMedName, array('y'=> count(array_keys($p_meds_alltime, $prescribed_med->med_id)), 'name'=>$prescribed_med->med_id, 'color'=>$rand_background));
    }

    foreach ($diagnoses as $diagnosis) {
      $rand_background = $background_colors[array_rand($background_colors)];
      array_push($arrayDiagName, array('y'=> count(array_keys($diagnoses_alltime, $diagnosis->dis_id)), 'name'=>$diagnosis->dis_id, 'color'=>$rand_background));
    }
    $headsizes = array();
    $ex_hs = array();
    $lengths = array();
    $ex_len = array();
    $weights = array();
    $ex_w = array();
    $x_axis = array();
    foreach ($visit_histories as $visit_history) {
      // code...
      if($visit_history->ageinmonths >= '0' && $visit_history->ageinmonths < '13') {
        array_push($x_axis, $visit_history->ageinmonths);
        array_push($headsizes, $visit_history->head_size);
        array_push($ex_hs, $visit_history->ex_head_size);
        array_push($lengths, $visit_history->length);
        array_push($ex_len, $visit_history->ex_length);
        array_push($weights, $visit_history->weight);
        array_push($ex_w, $visit_history->ex_weight);
      }
    }
    return view ('patDetailedDashboard')
    ->with('x_axis', json_encode($x_axis))
    ->with('visit_history', $visit_history)
    ->with('visit_history_hs', json_encode($headsizes))
    ->with('ex_hs', json_encode($ex_hs))
    ->with('visit_history_len', json_encode($lengths))
    ->with('ex_len', json_encode($ex_len))
    ->with('visit_history_w', json_encode($weights))
    ->with('ex_w', json_encode($ex_w))
    ->with('patient', $patient)
    ->with('doctor', $doctor)
    ->with('centers', $centers)
    ->with('diagnoses', $diagnoses)
    ->with('prescribed_med', $prescribed_med)
    ->with('medical_histories', $medical_histories)
    ->with('vacc_histories_t', $vacc_histories_t)
    ->with('vacc_histories_f', $vacc_histories_f)
    ->with('arrmed', json_encode($arrayMedName))
    ->with('arrdiag', json_encode($arrayDiagName));
  }
}
