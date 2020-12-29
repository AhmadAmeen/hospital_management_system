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
//add doc center
Route::post('doctorstore', 'DoctorController@doctorstore');
//add doc center
Route::get('doc_adv_center_add/{doc_id}', 'DoctorController@doc_adv_center_add');
Route::post('doctorcenterstore', 'CenterController@doctorcenterstore');
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
//doctor updating his center
Route::get('doc_updatecenter/{doc_id}', 'AdvCenterController@doc_updatecenter');
//doctor sending vaccine message
Route::get('vaccinationmsg/{doc_id}', 'AdvVaccineController@vaccinationmsg');

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
//patient reg form doc
Route::get('docpatientregform/{doc_id}', 'PatientController@docshow');
Route::post('docregisternewpatient/{doc_id}', 'PatientController@docregisternewpatient');
//show all patients
Route::get('docshowpatients/{doc_id}', 'PatientController@docshowpatients');
//edit, update & delete Patient
Route::get('doceditingpatient/{id}', 'PatientController@doceditingpatient');
Route::post('docupdatepatient/{id}', 'PatientController@docupdatepatient');
Route::get('docdeletepatient/{id}', 'PatientController@docdeletepatient');
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
//specific vh medicines prescribed
Route::get('specific_med_patient/{vh_id}', 'VisitHistoryController@specific_med_patient');
//specific vh diagnosis
Route::get('specific_diag_patient/{vh_id}', 'VisitHistoryController@specific_diag_patient');
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
// show main page of medical history to add
Route::get('docaddmedicalhistory/{pat_id}', 'MedicalHistoryController@docshow');
// show main page of edit medical history
Route::get('editmedicalhistory/{pat_id}', 'MedicalHistoryController@editmedicalhistory');
//store patient medical history
Route::post('patientmedhistorystore/{pat_id}', 'MedicalHistoryController@patientmedhistorystore');
//store patient medical history
Route::post('docpatientmedhistorystore/{pat_id}', 'MedicalHistoryController@docpatientmedhistorystore');
//update medical history
Route::post('updatemedicalhistory/{pat_id}', 'MedicalHistoryController@updatemedicalhistory');
//update medical history
Route::post('recep_updatemedicalhistory/{pat_id}', 'MedicalHistoryController@recep_updatemedicalhistory');
//show patient vaccination history page
Route::get('vaccinehistoryview/{pat_id}', 'VaccinationHistoryController@show');
//show patient vaccination history page
Route::get('docvaccinehistoryview/{pat_id}', 'VaccinationHistoryController@docshow');
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
Route::post('doc_advvaccineforpatientstore/{pat_id}', 'VaccinationHistoryController@doc_advvaccineforpatientstore');

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
Route::get('TodocMainPage/{pat_id}', 'DoctorController@TodocMainPage');
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
Route::post('finalvisithistorystore','DoctorController@store');
//show all patients
Route::get('getmedicinename/{med_id}', 'MedicineController@getmedicine');
// add new med
Route::post('addnewmedicine', 'MedicineController@addnewmedicine');
//tvh => temporary visit history record from recep
Route::get('fetch_tvh_records', 'DoctorController@fetch_tvh_records');
//tvh => temporary visit history record from recep
Route::get('getTypeOfVisit/{pat_id}', 'DoctorController@getTypeOfVisit');
//fvh => final visit history record from recep
Route::get('patient_fvh_record/{pat_id}', 'FinalVisitHistoryController@patient_fvh_record');
//fvh => final visit history record from recep
Route::get('docunavailable/{doc_id}', 'DoctorController@docunavailable');
//docunavailable post and rescheduling
Route::post('pat_rescheduled', 'ScheduleController@pat_rescheduled');
//prescription view
Route::view('prescriptionview', 'prescriptionview');
Route::post('finalvisithistorystore','FinalVisitHistoryController@store');
//show doc dashboard
Route::get('showdashboard/{doc_id}', 'DoctorController@showdashboard');
// add medical adddiagnosis
Route::post('adddiagnosis','DiagnosisController@adddiagnosis');
// add medical adddiagnosis
Route::post('addprescribedmedicine','PrescribedMedicineController@addprescribedmedicine');
//get patient diagnosis for current vh
Route::get('getdiagnosis/{vh_id}', 'DiagnosisController@getdiagnosis');
//delete Diagnosis
// remove medical diagnosis
Route::post('removediagnosis','DiagnosisController@removediagnosis');
//get patient prescribed medicines for current vh
Route::get('getmedicines/{vh_id}', 'PrescribedMedicineController@getmedicines');
// remove medicine
Route::post('removemedicines','PrescribedMedicineController@removemedicines');
//return view of prescriptionview
Route::get('showPrescription/{vh_id}/{note}', 'DoctorController@showPrescription');
//Route::view('showPrescription', 'showPrescription');
Route::view('demo_prescriptionview', 'demo_prescriptionview');
//update dashboard
Route::get('updatedashboard/{from}/{to}', 'DoctorController@updatedashboard');
// remove Pat From List
Route::get('removePatFromList/{vh_id}', 'DoctorController@removePatFromList');
// doc updating center
Route::post('doc_updatingcenter', 'AdvCenterController@doc_updatingcenter');
//doc unavail reschedule
Route::view('docunavail_reschedule', 'docunavail_reschedule');
// pat patDetailedDashboard
Route::get('patDetailedDashboard/{pat_id}/{vh_id}', 'DoctorController@patDetailedDashboard');
//getCenterOffdays
Route::get('getCenterOffdays/{c_id}', 'AdvOffdaysController@getCenterOffdays');
