<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Receptionist;
use App\Doctor;
use Validator;
use Session;

class ReceptionistController extends Controller
{
   public function recplogin () {
     return view ('recplogin');
   }

   public function recplogout() {
     Session::flush();
     return redirect('/');
   }

   public function receploggedin(Request $request) {
     $receptionist = Receptionist::where('username',$request->username)->where('password',$request->password)
     ->get()
     ->toArray();
     if ($receptionist) {
       $request->session()->put('recep_session', $receptionist[0]['id']);
       $request->session()->put('recep_name_session', $request->username);
       return redirect('patientregform');
     } else {
       session::flash('coc', 'Email or Password is incorrect!');
       return redirect('recplogin')->withinput();
     }
   }

   public function doctorrecepstore (Request $request) {
     $validator = Validator::make($request->all(), [
       'username' => 'unique:receptionists,username',
       'password' => 'min:6',
     ]);
     if ($validator->fails()) {
         return view ('docregform_recepsdetails')
         ->with('current_doc_id', $request->doc_id)
         ->with('center_id', $request->$center->id)
         ->withErrors($validator);
                     //->withInput();
     }
     
     $receptionist = new Receptionist;
     $receptionist->username = $request->username;
     $receptionist->password = $request->password;
     $receptionist->doc_id = $request->doc_id;
     $receptionist->center_id = $request->center_id;
     $current_doc_id = $receptionist->doc_id;
     $receptionist->save();
     return view ('docregform_centersdetails')->with('current_doc_id', $current_doc_id);
   }

   public function addrecepfromupdate (Request $request) {
     $validator = Validator::make($request->all(), [
       'username' => 'unique:receptionists,username',
       'password' => 'min:6',
     ]);
     if ($validator->fails()) {
         return view ('addrecepfromupdate')->with('current_doc_id', $request->doc_id)
                     ->withErrors($validator);
                     //->withInput();
     }
     $receptionist = new Receptionist;
     $receptionist->username = $request->username;
     $receptionist->password = $request->password;
     $receptionist->doc_id = $request->doc_id;
     $current_doc_id = $receptionist->doc_id;
     $receptionist->save();
     return redirect ('showdoctors');
   }
}
