<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;

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
      $patient->age = $request->age;
      $patient->dob = $request->dob;
      $patient->father_name = $request->father_name;
      $patient->guard_no = $request->guard_no;
      $patient->pat_history = $request->pat_history;
      $id = $request->session()->get('recep_session');
      $doctor = Doctor::find($id);
      $patient->doc_id = $doctor->id;
      $patient->save();
    }

}
