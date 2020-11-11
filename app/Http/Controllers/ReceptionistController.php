<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Receptionist;
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
     $receptionist = new Receptionist;
     $receptionist->username = $request->username;
     $receptionist->password = $request->password;
     $receptionist->doc_id = $request->doc_id;
     $current_doc_id = $receptionist->doc_id;
     $receptionist->save();
     return view ('docregform_centersdetails')->with('current_doc_id', $current_doc_id);
   }
}