<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\DocCenterImages;
use App\AdvCenter;
use Illuminate\Http\Request;

class DoctorWebsiteController extends Controller
{
    public function docWebsiteBuilder ($doc_id) {
      //get all the data
      return view('docWebsiteBuilder');
    }

    public function visitOwnWebsite ($doc_id) {
      $doctor = Doctor::find ($doc_id);
      $centers = AdvCenter::where('doc_id', $doc_id)->get();
      $images = DocCenterImages::get();
      //return view('image-gallery',compact('images'));
      return view('DrWebsiteView')->with('doctor', $doctor)->with('doc_id', $doc_id)->with('centers', $centers)->with(compact('images'));
    }

    public function visitWebsite($webname) {
      return view('DrWebsiteView');
    }
}
