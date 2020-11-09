<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;

class AdminController extends Controller
{
  public function adminlogin() {
    return view('adminlogin');
  }

  public function adminlogout() {
    Session::flush();
    return redirect('/adminlogin');
  }

  public function adminloggedin(Request $request) {
    $admin = admin::where('username',$request->username)->where('password',$request->password)
    ->get()
    ->toArray();
    if ($admin) {
      $request->session()->put('admin_session', $admin[0]['id']);
      $request->session()->put('admin_name_session', $request->username);
      return redirect('docregform_docdetails');
    } else {
      session::flash('coc', 'Email or Password is incorrect!');
      return redirect('adminlogin')->withinput();
    }
  }
}
