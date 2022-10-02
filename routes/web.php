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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patients', [App\Http\Controllers\PatientController::class, 'patients'])->name('patients');
Route::get('/patient-form', [App\Http\Controllers\PatientController::class, 'patient_form'])->name('patient_form');
Route::post('/add-patient', [App\Http\Controllers\PatientController::class, 'add_patient'])->name('add_patient');
Route::get('/patient-view/{id}', [App\Http\Controllers\PatientController::class, 'patient_view'])->name('patient_view');
Route::post('/update-patient/{id}', [App\Http\Controllers\PatientController::class, 'patient_update'])->name('patient_update');
Route::get('/consultant/{id}', [App\Http\Controllers\PatientController::class, 'consultant'])->name('consultant');
Route::post('/consultant-to/{patient_id}', [App\Http\Controllers\PatientController::class, 'consultant_to'])->name('consultant_to');



Route::get('/doctors', [App\Http\Controllers\DoctorController::class, 'doctors'])->name('doctors');
Route::get('/doctor-form', [App\Http\Controllers\DoctorController::class, 'doctor_form'])->name('doctor_form');
Route::post('/add-doctor', [App\Http\Controllers\DoctorController::class, 'add_doctor'])->name('add_doctor');
Route::get('/doctor-view/{id}', [App\Http\Controllers\DoctorController::class, 'doctor_view'])->name('doctor_view');
Route::post('/update-doctor/{id}', [App\Http\Controllers\DoctorController::class, 'doctor_update'])->name('doctor_update');



Route::get('/consultations', [App\Http\Controllers\ConsultationController::class, 'consultations'])->name('consultations');
Route::get('/consultation-history/{id}', [App\Http\Controllers\ConsultationController::class, 'consultation_history'])->name('consultation_history');
Route::get('/problem/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'problem'])->name('problem');
Route::post('/submit-problem/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'submit_problem'])->name('submit_problem');
Route::get('/prescribe/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'prescribe'])->name('prescribe');
Route::post('/submit-prescribe/{consultation_id}', [App\Http\Controllers\ConsultationController::class, 'submit_prescribe'])->name('submit_prescribe');
});