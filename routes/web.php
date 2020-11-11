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
//add doc receptionist
Route::post('doctorrecepstore', 'ReceptionistController@doctorrecepstore');
//show all doctors
Route::get('showdoctors', 'DoctorController@showdoctors');
//edit, update & delete doctor
Route::get('editingdoctor/{id}', 'DoctorController@editingdoctor');
Route::post('updatedoctor/{id}', 'DoctorController@updatedoctor');
Route::get('deletedoctor/{id}', 'DoctorController@deletedoctor');
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
