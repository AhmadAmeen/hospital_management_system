<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use Carbon\Carbon;
use App\Receptionist;

class PatientController extends Controller
{
    public function show () {
      return view ('patientregform');
    }

    public function registernewpatient (Request $request) {
      $patient = new Patient;
      $patient->fname = $request->fname;
      $patient->lname = $request->lname;
      $patient->gender = $request->gender;
      $patient->dob = $request->dob;
      $age = Carbon::parse($patient->dob)->diff(Carbon::now())->format('%y years, %m months and %d days');
      $patient->age = $age;
      $patient->father_name = $request->father_name;
      $patient->guard_no = $request->guard_no;
      $patient->pat_history = $request->pat_history;
      $recp_id = $request->session()->get('recep_session');
      $recep = Receptionist::find($recp_id);
      $doctor = Doctor::find($recep->doc_id);
      echo $doctor->doc_id;
      $patient->doc_id = $doctor->id;
      $patient->save();
      return $this->showpatients();
    }

    public function getseachedpatients (Request $request) {
       $patients = Patient::where('fname' ,$request->pname)
       ->orwhere('lname' ,$request->pname)
       ->orwhere('gender' ,$request->pname)
       ->orwhere('father_name' ,$request->pname)
       ->orwhere('guard_no' ,$request->pname)
       ->paginate(5);
       return view ('showpatients')->with('patients', $patients);
    }

    public function showpatients () {
      //getting all patients
      $patients = Patient::get();
      return view ('showpatients')->with('patients', $patients);

      //get the patients of only this recep's doctor
      //$recp_id = $request->session()->get('recep_session');
      //$recep = Receptionist::find($recp_id);
      //$patients = Patient::where('doc_id', $recep->doc_id)->get();
      //return view ('showpatients')->with('patients', $patients);
}

   public function editingpatient($id) {
     $patient = Patient::find($id);
     return view ('editingpatient')->with('patient', $patient);
  }

   public function updatepatient($id, Request $request) {
     $patient = Patient::find($id);
     $patient->fname = $request->fname;
     $patient->lname = $request->lname;
     $patient->gender = $request->gender;
     $patient->dob = $request->dob;
     $patient->dob = $request->dob;
     $age = Carbon::parse($patient->dob)->diff(Carbon::now())->format('%y years, %m months and %d days');
     $patient->age = $age;
     $patient->father_name = $request->father_name;
     $patient->guard_no = $request->guard_no;
     $patient->pat_history = $request->pat_history;
     $recp_id = $request->session()->get('recep_session');
     $recep = Receptionist::find($recp_id);
     $doctor = Doctor::find($recep->doc_id);
     //echo $doctor->doc_id;
     $patient->doc_id = $doctor->id;
     $patient->save();
     return $this->showpatients();
   }

   public function deletepatient ($id) {
     $patient = Patient::find($id);
     $patient->delete();
     return redirect('showpatients');
   }

   public function getAge(){
       return $this->birthdate->diff(Carbon::now())
            ->format('%y years, %m months and %d days');
   }
}
