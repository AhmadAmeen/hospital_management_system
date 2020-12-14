<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\AdvCenter;
use App\Receptionist;
use Carbon\Carbon;
use Image;

class PatientController extends Controller
{
    public function show ($recep_id) {
      //send centers of current doctor with it
      //find current receptionist
      $receptionist = Receptionist::find($recep_id);
      //get current doc id
      $cur_doc_id = $receptionist->doc_id;
      $centers = AdvCenter::where('doc_id', $cur_doc_id)->get();
      return view ('patientregform')->with('centers', $centers);
    }

    public function registernewpatient (Request $request) {
      try {
        $patient = new Patient;
        $patient->fname = $request->fname;
        $patient->lname = $request->lname;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob;
        $age = Carbon::parse($patient->dob)->diff(Carbon::now())->format('%y years, %m months and %d days');
        $patient->age = $age;
        $patient->father_name = $request->father_name;
        $patient->guard_no = $request->guard_no;
        //patient history image add
        $image_file = $request->file('pat_history');
        $image_resize = Image::make($image_file)->resize(500, 500)->encode('jpg');
        $patient->pat_history = $image_resize;
        //patient history image added
        //$patient->pat_history = $request->pat_history;
        $recp_id = $request->session()->get('recep_session');
        $recep = Receptionist::find($recp_id);
        $doctor = Doctor::find($recep->doc_id);
        //echo $doctor->doc_id;
        $patient->doc_id = $doctor->id;
        //echo $request->patient_cid;
        $patient->center_id = $request->patient_cid;
        $patient->save();
        //return redirect('showpatients/' . session('recep_session'));
        return redirect('addmedicalhistory/' . $patient->id);
      } catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
      }
    }

    public function getseachedpatients (Request $request) {
      $recep_id = $request->session()->get('recep_session');
      $receptionist = Receptionist::find($recep_id);
       $patients = Patient::where('fname' ,$request->pname)->where('doc_id', $receptionist->doc_id)
       ->orwhere('lname' ,$request->pname)->where('doc_id', $receptionist->doc_id)
       ->orwhere('gender' ,$request->pname)->where('doc_id', $receptionist->doc_id)
       ->orwhere('father_name' ,$request->pname)->where('doc_id', $receptionist->doc_id)
       ->orwhere('guard_no' ,$request->pname)->where('doc_id', $receptionist->doc_id)
       ->paginate(5);
       return view ('showsearchedpatients')->with('patients', $patients);
    }

    public function showpatients ($recep_id) {
      //find current receptionist
      $receptionist = Receptionist::find($recep_id);
      //getting all patients
      $patients = Patient::where('doc_id', $receptionist->doc_id)->paginate(5);
      return view ('showpatients')->with('patients', $patients);
    }

    public function docshow ($doc_id) {
      //send centers of current doctor with it
      //find current receptionist
      //$receptionist = Receptionist::find($recep_id);
      //get current doc id
      //$cur_doc_id = $receptionist->doc_id;
      $centers = AdvCenter::where('doc_id', $doc_id)->get();
      return view ('docpatientregform')->with('centers', $centers);
    }

    public function docregisternewpatient ($doc_id, Request $request) {
      try {
        $patient = new Patient;
        $patient->fname = $request->fname;
        $patient->lname = $request->lname;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob;
        $age = Carbon::parse($patient->dob)->diff(Carbon::now())->format('%y years, %m months and %d days');
        $patient->age = $age;
        $patient->father_name = $request->father_name;
        $patient->guard_no = $request->guard_no;
        //patient history image add
        $image_file = $request->file('pat_history');
        $image_resize = Image::make($image_file)->resize(500, 500)->encode('jpg');
        $patient->pat_history = $image_resize;
        //patient history image added
        //$patient->pat_history = $request->pat_history;
        //$recp_id = $request->session()->get('recep_session');
        //$recep = Receptionist::find($recp_id);
        //$doctor = Doctor::find($recep->doc_id);
        //echo $doctor->doc_id;
        $patient->doc_id = $doc_id;
        //echo $request->patient_cid;
        $patient->center_id = $request->patient_cid;
        $patient->save();
        //return redirect('showpatients/' . session('recep_session'));
        return redirect('docaddmedicalhistory/' . $patient->id);
      } catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
      }
    }

   public function editingpatient($id) {
     $patient = Patient::find($id);
     return view ('editingpatient')->with('patient', $patient);
  }

   public function updatepatient($id, Request $request) {
     try{
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
     //patient history image update
     if($request->file('pat_history')){
     $image_file = $request->file('pat_history');
     $image_resize = Image::make($image_file)->resize(500, 500)->encode('jpg');
     $patient->pat_history = $image_resize;
     }
     //patient history image updated
     $recp_id = $request->session()->get('recep_session');
     $recep = Receptionist::find($recp_id);
     $doctor = Doctor::find($recep->doc_id);
     //echo $doctor->doc_id;
     $patient->doc_id = $doctor->id;
     $patient->save();
     //return redirect('showpatients/' . session('recep_session'));
     return redirect('editmedicalhistory/' . $patient->id);
     } catch(Exception $e) {
         echo 'Message: ' .$e->getMessage();
     }
   }

   public function deletepatient ($id) {
     $patient = Patient::find($id);
     $patient->delete();
     return redirect('showpatients/' . session('recep_session'));
   }

   public function getAge(){
       return $this->birthdate->diff(Carbon::now())
            ->format('%y years, %m months and %d days');
   }
}
