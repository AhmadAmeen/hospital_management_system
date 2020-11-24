<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Receptionist;
use App\Doctor;
use App\AdvCenter;
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
       //return redirect('patientregform/' . $receptionist[0]['id']);
       $receptionist = Receptionist::find($receptionist[0]['id']);
       $advcenters = AdvCenter::where('doc_id', $receptionist->doc_id)->get();
       $repc_center = AdvCenter::find($receptionist->center_id);
       //print_r($advcenters);
       return view('receploginselectcenter')->with('advcenters', $advcenters)
       ->with('receptionist', $receptionist)
       ->with('repadvcurrentcenter', $repc_center->cname);
       } else {
       session::flash('coc', 'Email or Password is incorrect!');
       return redirect('recplogin')->withinput();
       }
   }

   public function doctorrecepstore (Request $request) {
     try {
     $validator = Validator::make($request->all(), [
       'username' => 'unique:receptionists,username',
       'password' => 'min:6',
     ]);
     if ($validator->fails()) {
         return view ('docregform_recepsdetails')
         ->with('current_doc_id', $request->doc_id)
         ->with('center_id', $request->center_id)
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
     $center = AdvCenter::find($request->center_id);
     //create days array
     return redirect('showoffdaysforcenter/' . $current_doc_id . '/' . $center->id);
     } catch(Exception $e) {
         echo 'Message: ' .$e->getMessage();
     }
   }

   public function addrecepfromupdate (Request $request) {
     try {
     $validator = Validator::make($request->all(), [
       'username' => 'unique:receptionists,username',
       'password' => 'min:6',
     ]);
     if ($validator->fails()) {
         return view ('addrecepfromupdate')
           ->with('current_doc_id', $request->doc_id)
           ->with('center_id', $request->center_id)
           ->withErrors($validator);
           //->withInput();
     }
     $receptionist = new Receptionist;
     $receptionist->username = $request->username;
     $receptionist->password = $request->password;
     $receptionist->doc_id = $request->doc_id;
     $current_doc_id = $request->doc_id;
     $receptionist->center_id = $request->center_id;
     $receptionist->save();
     //return redirect ('showdoctors');
     $center = AdvCenter::find($request->center_id);
     return view ('editingcenter')->with('center', $center);
     } catch(Exception $e) {
         echo 'Message: ' .$e->getMessage();
     }
   }

   public function storerecepcurcenter($recep_id, Request $request) {
     try{
     $request->session()->put('rc_cid_session', $request->center_selected);
     $rc_cname = AdvCenter::find($request->center_selected);
     $request->session()->put('rc_cname_session', $rc_cname->cname);
     //echo $request->center_selected . " ";
     //echo "$recep_id";
     return redirect('patientregform/' . $recep_id);
     } catch(Exception $e) {
         echo 'Message: ' .$e->getMessage();
     }
   }
}
