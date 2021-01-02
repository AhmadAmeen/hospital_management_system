<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\DocCenterImages;
use App\DocWebsite;
use App\AdvCenter;
use Illuminate\Http\Request;

class DoctorWebsiteController extends Controller
{
    public function docWebsiteBuilder ($doc_id) {
      //get all the data
      $docWeb = DocWebsite::where('doc_id', $doc_id)->first();
      return view('docWebsiteBuilder')->with('docWeb', $docWeb);
    }

    public function visitOwnWebsite ($doc_id) {
      $doctor = Doctor::find ($doc_id);
      $centers = AdvCenter::where('doc_id', $doc_id)->get();
      $images = DocCenterImages::get();
      $docWeb = DocWebsite::where('doc_id', $doc_id)->first();
      //return view('image-gallery',compact('images'));
      return view('DrWebsiteView')->with('doctor', $doctor)->with('doc_id', $doc_id)->with('centers', $centers)->with(compact('images'))->with('docWeb', $docWeb);
    }

    public function visitWebsite($webname) {
      return view('DrWebsiteView');
    }
}
