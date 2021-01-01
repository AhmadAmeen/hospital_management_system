<?php

namespace App\Http\Controllers;
use App\DocCenterImages;
use Illuminate\Http\Request;

class DocCenterImagesController extends Controller
{

  /**
  * Listing Of images gallery
  *
  * @return \Illuminate\Http\Response
  */
 public function index()
 {
   $images = DocCenterImages::get();
   return view('image-gallery',compact('images'));
 }


 /**
  * Upload image function
  *
  * @return \Illuminate\Http\Response
  */
 public function upload(Request $request)
 {
   $this->validate($request, [
     'title' => 'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);

     $doc_id = $request->session()->get('doctor_session');
     $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
     $request->image->move(public_path('images/'.$doc_id), $input['image']);

     $input['title'] = $request->title;
     $input['doc_id'] = $doc_id;
     DocCenterImages::create($input);

   return back()
     ->with('success','Image Uploaded successfully.');
 }

 /**
  * Remove Image function
  *
  * @return \Illuminate\Http\Response
  */
 public function destroy($id)
 {
   DocCenterImages::find($id)->delete();
   return back()
     ->with('success','Image removed successfully.');
 }
}
