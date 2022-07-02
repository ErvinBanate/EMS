<?php

use App\Http\Controllers\IncidentReportController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
})->name('logIn');

Auth::routes();

Route::post('/store', [App\Http\Controllers\IncidentReportController::class, 'store'])->name('store');
Route::post('/update/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'update'])->name('update');
Route::post('/approve/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'approve'])->name('approve');
Route::post('/reject/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'reject'])->name('reject');

Route::get('/edit/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'edit'])->name('edit');
Route::get('/remove/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'destroy'])->name('remove');
Route::get('/show/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'show'])->name('show');
Route::get('/confirmApprove/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'confirmApproveData'])->name('confirmApprove');
Route::get('/confirmReject/{incident_report}', [App\Http\Controllers\IncidentReportController::class, 'confirmRejectData'])->name('confirmReject');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\IncidentReportController::class, 'index']);
Route::get('/users', [App\Http\Controllers\adminController::class, 'index'])->name('users');
Route::get('/incidentReport', [App\Http\Controllers\IncidentReportController::class, 'create'])->name('create');