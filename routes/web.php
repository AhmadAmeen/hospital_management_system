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
//Route::get('showcentersofcurdoc/{id}', 'CenterController@showcentersofcurdoc');
//show adv centers of current doc
Route::get('showcentersofcurdoc/{id}', 'AdvCenterController@showcentersofcurdoc');
//show vaccine of current doc
Route::get('getseachedcenters', 'AdvCenterController@getseachedcenters');
//show vaccines of cur doc
Route::get('showvaccinesofcurdoc/{doc_id}', 'VaccineController@showvaccinesofcurdoc');
//edit, update & delete center
//Route::get('editingcenter/{id}', 'CenterController@editingcenter');
//Route::post('updatecenter/{id}', 'CenterController@updatecenter');
//Route::get('deletecenter/{id}', 'CenterController@deletecenter');
//edit, update & delete center
Route::get('editingcenter/{id}', 'AdvCenterController@editingcenter');
Route::post('updatecenter/{id}', 'AdvCenterController@updatecenter');
Route::get('deletecenter/{id}', 'AdvCenterController@deletecenter');
//edit, update & delete center off-days
Route::get('editingcenteroffdays/{center_id}', 'OffdaysController@editingcenteroffdays');
Route::post('updatecenteroffdays/{center_id}', 'OffdaysController@updatecenteroffdays');
Route::get('deletecenteroffdays/{center_id}', 'OffdaysController@deletecenteroffdays');
//edit, update & delete center-timings
Route::get('editingcentertimings/{center_id}', 'CentertimingController@editingcentertimings');
Route::post('updatecentertimings/{center_id}', 'CentertimingController@updatecentertimings');
Route::get('deletecentertimings/{center_id}', 'CentertimingController@deletecentertimings');
Route::get('addcentertimingfromupdate/{center_id}', 'CentertimingController@addcentertimingfromupdate');
Route::post('addingcentertimingfromupdate', 'CentertimingController@addingcentertimingfromupdate');
//show update vaccine
//Route::post('updatevaccine/{id}', 'VaccineController@updatevaccine');
//receptionist
Route::view('recplogin', 'recplogin');
Route::post('/isreceplogin', 'ReceptionistController@receploggedin');
//patient
Route::get('patientregform/{recep_id}', 'PatientController@show');
Route::post('registernewpatient', 'PatientController@registernewpatient');
//show all patients
Route::get('showpatients/{recep_id}', 'PatientController@showpatients');
//edit, update & delete Patient
Route::get('editingpatient/{id}', 'PatientController@editingpatient');
Route::post('updatepatient/{id}', 'PatientController@updatepatient');
Route::get('deletepatient/{id}', 'PatientController@deletepatient');
//patient visit history main page route
Route::get('vh_main_patients', 'VisitHistoryController@vh_main_patients');
//choosen patient previous history
Route::get('vh_patient/{id}', 'VisitHistoryController@vh_patient');
//choosen patient previous history
Route::get('mh_patient/{id}', 'MedicalHistoryController@mh_patient');
//choosen patient previous history
Route::get('vh_and_patient/{pid}', 'VisitHistoryController@vh_and_patient');
//choosen patient previous history
Route::get('specific_vh_patient/{vh_id}', 'VisitHistoryController@specific_vh_patient');
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

Route::get('patientsdatajson', 'DoctorController@patientsdatajson');
//advance center storing
Route::post('doctoradvcentersstore', 'AdvCenterController@doctoradvcentersstore');
//advance center show
Route::get('addnewcenter/{doc_id}', 'AdvCenterController@addnewcenter');
//advance center off-days storing
Route::post('doctoradvcenteroffdaysstore', 'OffdaysController@doctoradvcenteroffdaysstore');
//advance center timings storing
Route::post('doctoradvcentertimingsstore', 'CentertimingController@doctoradvcentertimingsstore');
//show off-days page for the center and doctor
Route::get('showoffdaysforcenter/{doc_id}/{center_id}', 'OffdaysController@showoffdaysforcenter');
// show main page of medical history to add
Route::get('addmedicalhistory/{pat_id}', 'MedicalHistoryController@show');
// show main page of edit medical history
Route::get('editmedicalhistory/{pat_id}', 'MedicalHistoryController@editmedicalhistory');
//store patient medical history
Route::post('patientmedhistorystore/{pat_id}', 'MedicalHistoryController@patientmedhistorystore');
//update medical history
Route::post('updatemedicalhistory/{pat_id}', 'MedicalHistoryController@updatemedicalhistory');
//update medical history
Route::post('recep_updatemedicalhistory/{pat_id}', 'MedicalHistoryController@recep_updatemedicalhistory');
//show patient vaccination history page
Route::get('vaccinehistoryview/{pat_id}', 'VaccinationHistoryController@show');
//show patient vaccination history page
Route::get('addmanualmedhistory/{pat_id}', 'MedicalHistoryController@addmanualmedhistory');
//add new medical history
Route::post('addmanualmedhistorystore/{pat_id}', 'MedicalHistoryController@addmanualmedhistorystore');
//add advance vaccine main page
Route::get('addadvvaccine/{current_doc_id}', 'AdvVaccineController@show');
//add adv vaccine store
Route::post('addadvvaccinestore/{current_doc_id}', 'AdvVaccineController@store');
//add advance vaccine main page
Route::get('addadvvaccinetiming/{adv_vid}', 'AdvVaccineTimingController@show');
//add adv vaccine store
Route::post('addadvvaccinetimingstore/{adv_vid}', 'AdvVaccineTimingController@store');
//add adv vaccine store history
Route::post('advvaccineforpatientstore/{pat_id}', 'VaccinationHistoryController@advvaccineforpatientstore');
//store recep center at recep login
Route::post('storerecepcurcenter/{recep_id}', 'ReceptionistController@storerecepcurcenter');
//show adv-vaccines of current doctor
Route::get('showadvvaccinesofcurdoc/{doc_id}', 'AdvVaccineController@showadvvaccinesofcurdoc');
//edit, update & delete adv-vaccine
Route::get('editingvaccine/{vid}/{doc_id}', 'AdvVaccineController@editingvaccineshow');
Route::post('updatevaccine/{vid}/{doc_id}', 'AdvVaccineController@updatevaccine');
Route::get('deletevaccine/{vid}/{doc_id}', 'AdvVaccineController@deletevaccine');
//edit, update & delete center-timings
Route::get('editvaccinetimings/{vid}', 'AdvVaccineTimingController@editvaccinetimings');
Route::post('updatevaccinetimings/{vid}', 'AdvVaccineTimingController@updatevaccinetimings');
Route::get('deletevaccinetiming/{vt_id}', 'AdvVaccineTimingController@deletevaccinetiming');
Route::get('addvaccinetimingfromupdate/{vid}', 'AdvVaccineTimingController@addvaccinetimingfromupdate');
Route::post('addingvaccinetimingfromupdate/{vid}', 'AdvVaccineTimingController@addingvaccinetiming');
// edit vaccination history
Route::get('editvaccinationhistory/{pat_id}', 'VaccinationHistoryController@editvaccinationhistory');
// edit vaccination history
Route::get('editvaccinationhistorydoc/{pat_id}', 'VaccinationHistoryController@editvaccinationhistorydoc');
//add adv vaccine update history
Route::post('advvaccineforpatientupdate/{pat_id}', 'VaccinationHistoryController@advvaccineforpatientupdate');
//add adv vaccine update history
Route::post('advvaccineforpatientupdatedoc/{pat_id}', 'VaccinationHistoryController@advvaccineforpatientupdatedoc');
//main page doc from vacc redirect
Route::get('TodocMainPage/{pat_id}', 'DoctorController@docMainPage');
//add adv vaccine update history
Route::post('recep_advvaccineforpatientupdate/{pat_id}', 'VaccinationHistoryController@recep_advvaccineforpatientupdate');
//schedule view
Route::get('schedulingpatient/{pat_id}', 'ScheduleController@show');
//schedule view
Route::get('docschedulingpatient/{pat_id}', 'ScheduleController@showfordoc');
//testing
Route::post('checkcenteroffdays','ScheduleController@index');
//get c t
Route::get('getCenterTimings/{cid}','ScheduleController@getCenterTimings');
//schedulepatientstore
Route::post('schedulepatientstore','ScheduleController@schedulepatientstore');
//get c t slots
Route::get('get_ct_slots/{ct_id}','ScheduleController@get_ct_slots');
//show all patients
Route::get('recep_main_p_visit/{pat_id}', 'ReceptionistController@show');
//show all patients
Route::get('searchmedicine/{med_id}', 'MedicinePotencyController@show');
//schedulepatientstore
Route::post('finalvisithistorystore','FinalVisitHistoryController@store');
//show all patients
Route::get('getmedicinename/{med_id}', 'MedicineController@getmedicine');
//tvh => temporary visit history record from recep
Route::get('fetch_tvh_records', 'DoctorController@fetch_tvh_records');
//tvh => temporary visit history record from recep
Route::get('getTypeOfVisit/{pat_id}', 'DoctorController@getTypeOfVisit');
//fvh => final visit history record from recep
Route::get('patient_fvh_record/{pat_id}', 'FinalVisitHistoryController@patient_fvh_record');
