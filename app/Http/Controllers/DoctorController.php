<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Doctor;
use Illuminate\Facades\Response;
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

  public function doctorloggedin(Request $request) {
    $doctor = Doctor::where('username',$request->username)->where('password',$request->password)
    ->get()
    ->toArray();
    if ($doctor) {
      $request->session()->put('doctor_session', $doctor[0]['id']);
      $request->session()->put('doctor_name_session', $request->username);
      return redirect('doctormainpage');
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
      /*
      if ($request->has_receptionist == "TRUE") {
      $doctor->has_receptionist = $request->has_receptionist;
      } else {
      $doctor->has_receptionist = "FALSE";
      }
      */
      $doctor->save();
      /*
      if ($request->has_receptionist == "TRUE") {
        return view ('docregform_recepsdetails')->with('current_doc_id', $doctor->id);
      } else {
        return view ('docregform_centersdetails')->with('current_doc_id', $doctor->id);
      }
      */
      return view ('docregform_adv_centerdetails')->with('current_doc_id', $doctor->id);
    }

    public function showdoctors() {
      $doctors = Doctor::paginate(5);
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
      /*
      $current_state = $doctor->has_receptionist;
      if ($request->has_receptionist == "TRUE") {
      $doctor->has_receptionist = $request->has_receptionist;
      $doctor->save();
      //add receptionist
        if($request->has_receptionist == $current_state) {
          return redirect ('showdoctors');
        } else {
          return view ('addrecepfromupdate')->with('current_doc_id', $doctor->id);
        }
      } else {
      $doctor->has_receptionist = "FALSE";
      }
      */
      $doctor->save();
      return redirect ('showdoctors');
    }

    public function deletedoctor($id) {
      $doctor = Doctor::find($id);
      $doctor->delete();
      return redirect('showdoctors');
    }

   public function getseacheddoctors(Request $request) {
     $doctors = Doctor::where('dname' ,$request->dname)
     ->orwhere('qualification' ,$request->dname)
     ->orwhere('phno' ,$request->dname)
     ->orwhere('email' ,$request->dname)
     ->orwhere('username' ,$request->dname)
     ->orwhere('has_receptionist' ,$request->dname)
     ->paginate(5);
     return view ('showdoctors')->with('doctors', $doctors);
   }
}
