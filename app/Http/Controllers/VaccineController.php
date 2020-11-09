<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function show ($current_doc_id) {
      return view ('docregform_vaccinedetails')->with('current_doc_id', $current_doc_id);
    }
}
