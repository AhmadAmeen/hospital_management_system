<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Doctor;
use Illuminate\Facades\Response;
use Image;

class DoctorController extends Controller
{
    public function show() {
      return view ('docregform_docdetails');
    }

    public function doctorstore(Request $request) {
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
      if ($request->has_receptionist == "TRUE") {
      $doctor->has_receptionist = $request->has_receptionist;
      } else {
      $doctor->has_receptionist = "FALSE";
      }
      $doctor->save();
      if ($request->has_receptionist == "TRUE") {
        return view ('docregform_recepsdetails')->with('current_doc_id', $doctor->id);
      } else {
        return view ('docregform_centersdetails')->with('current_doc_id', $doctor->id);
      }
    }
}
