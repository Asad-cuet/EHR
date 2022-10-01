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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patients', [App\Http\Controllers\PatientController::class, 'patients'])->name('patients');
Route::get('/patient-form', [App\Http\Controllers\PatientController::class, 'patient_form'])->name('patient_form');
Route::post('/add-patient', [App\Http\Controllers\PatientController::class, 'add_patient'])->name('add_patient');
Route::get('/patient-view/{id}', [App\Http\Controllers\PatientController::class, 'patient_view'])->name('patient_view');
Route::post('/update-patient/{id}', [App\Http\Controllers\PatientController::class, 'patient_update'])->name('patient_update');
