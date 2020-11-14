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
//admin
Route::view('adminlogin', 'adminlogin');
Route::get('/getlogout', 'AdminController@adminlogout');
Route::post('/islogin', 'AdminController@adminloggedin');
//doctor
Route::get('docregform_docdetails', 'DoctorController@show');
Route::post('doctorstore', 'DoctorController@doctorstore');
//add doc center
Route::post('doctorcentersstore', 'CenterController@doctorcentersstore');
//add doc vaccine
Route::get('docregform_vaccinedetails/{current_doc_id}', 'VaccineController@show');
Route::post('doctorvaccinestore', 'VaccineController@doctorvaccinestore');
//doctorvaccineupdate
Route::post('doctorvaccineupdate', 'VaccineController@doctorvaccineupdate');
//add doc receptionist
Route::post('doctorrecepstore', 'ReceptionistController@doctorrecepstore');
//add doc receptionist from update
Route::post('addrecepfromupdate', 'ReceptionistController@addrecepfromupdate');
//show all doctors
Route::get('showdoctors', 'DoctorController@showdoctors');
//edit, update & delete doctor
Route::get('editingdoctor/{id}', 'DoctorController@editingdoctor');
Route::post('updatedoctor/{id}', 'DoctorController@updatedoctor');
Route::get('deletedoctor/{id}', 'DoctorController@deletedoctor');
//show centers of current doc
Route::get('showcentersofcurdoc/{id}', 'CenterController@showcentersofcurdoc');
//show vaccine of current doc
Route::get('showvaccinesofcurdoc/{doc_id}', 'VaccineController@showvaccinesofcurdoc');
//edit, update & delete center
Route::get('editingcenter/{id}', 'CenterController@editingcenter');
Route::post('updatecenter/{id}', 'CenterController@updatecenter');
Route::get('deletecenter/{id}', 'CenterController@deletecenter');
//show update vaccine
Route::post('updatevaccine/{id}', 'VaccineController@updatevaccine');
//receptionist
Route::view('recplogin', 'recplogin');
Route::post('/isreceplogin', 'ReceptionistController@receploggedin');
//patient
Route::get('patientregform', 'PatientController@show');
Route::post('registernewpatient', 'PatientController@registernewpatient');
//show all patients
Route::get('showpatients', 'PatientController@showpatients');
//edit, update & delete Patient
Route::get('editingpatient/{id}', 'PatientController@editingpatient');
Route::post('updatepatient/{id}', 'PatientController@updatepatient');
Route::get('deletepatient/{id}', 'PatientController@deletepatient');
//patient visit history main page route
Route::get('vh_main_patients', 'VisitHistoryController@vh_main__all_patients');
//choosen patient previous history
Route::get('vh_patient/{id}', 'VisitHistoryController@vh_patient');
//add new patient history main page
Route::get('addnewpvhhistory/{id}', 'VisitHistoryController@addnewpvhhistory');
//adding patient route
Route::post('addingpatientvh/{id}', 'VisitHistoryController@addingpatientvh');
//search Patients
Route::get('vh_getseachedpatients', 'VisitHistoryController@vh_getseachedpatients');
//search visit history patients
Route::get('getseachedpatients', 'PatientController@getseachedpatients');
//search doctors
Route::get('getseacheddoctors', 'DoctorController@getseacheddoctors');
//Doctor login/logout/isdoctorlogin
Route::view('doctorlogin', 'doctorlogin');
Route::get('/getdoctorlogout', 'DoctorController@getdoctorlogout');
Route::post('/isdoctorlogin', 'DoctorController@doctorloggedin');
//doctor main page
Route::view('doctormainpage', 'doctormainpage');
