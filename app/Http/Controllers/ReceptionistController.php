<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Receptionist;

class ReceptionistController extends Controller
{
   public function doctorrecepstore (Request $request) {
     $receptionist = new Receptionist;
     $receptionist->username = $request->username;
     $receptionist->password = $request->password;
     $receptionist->doc_id = $request->doc_id;
     $receptionist->save();
     return view ('docregform_centersdetails')->with('current_doc_id', $request->id);
   }
}
