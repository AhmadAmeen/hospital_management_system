<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::view('adminlogin', 'adminlogin');
Route::get('/getlogout', 'AdminController@adminlogout');
Route::post('/islogin', 'AdminController@adminloggedin');
Route::get('docregform_docdetails', 'DoctorController@show');
Route::post('doctorstore', 'DoctorController@doctorstore');
Route::post('doctorcentersstore', 'CenterController@doctorcentersstore');
Route::get('docregform_vaccinedetails/{current_doc_id}', 'VaccineController@show');
Route::post('doctorvaccinestore', 'VaccineController@doctorvaccinestore');
Route::post('doctorrecepstore', 'ReceptionistController@doctorrecepstore');
Route::view('recplogin', 'recplogin');
Route::post('/isreceplogin', 'ReceptionistController@receploggedin');
//patient
Route::get('patientregform', 'PatientController@show');
Route::post('registernewpatient', 'PatientController@registernewpatient');
