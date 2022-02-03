<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PracticesController;
use App\Http\Controllers\DenialController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MedicalController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', [LandingPageController::class, 'dashboard'])->name('landing');


//Auth::routes();

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [LandingPageController::class, 'index'])->name('page.login');
Route::get('/role_create', [LandingPageController::class, 'create'])->name('role.create');
Route::post('/role_create', [LandingPageController::class, 'store'])->name('role.store');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');


    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
   
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
// Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
Route::get('/dashboard', [LandingPageController::class, 'dashboard'])->name('user.dashboard');
Route::get('profile',[UserController::class,'profile'])->name('user.profile');
Route::get('/seting-user',[UserController::class,'view'])->name('seting-user');
Route::post('/add-update-user', [UserController::class, 'store'])->name('setings.store');
Route::post('/edit-user', [UserController::class, 'edit'])->name('setings.edit');
Route::post('/delete-user', [UserController::class, 'destroy'])->name('setings.delete');

//practices
Route::get('/practices',[PracticesController::class,'index'])->name('practice-view');
Route::post('/add-update-practices', [PracticesController::class, 'store'])->name('practice.store');
Route::post('/edit-practices', [PracticesController::class, 'edit'])->name('practice.edit');
Route::post('/delete-practices', [PracticesController::class, 'destroy'])->name('practice.delete');

//denial_reasons
Route::get('/denial',[DenialController::class,'index'])->name('denial-view');
Route::post('/add-update-denial', [DenialController::class, 'store'])->name('denial.store');
Route::post('/edit-denial', [DenialController::class, 'edit'])->name('denial.edit');
Route::post('/delete-denial', [DenialController::class, 'destroy'])->name('denial.delete');

//pending_reasons
Route::get('/pending',[DenialController::class,'view'])->name('pending-view');
Route::post('/add-update-pending', [DenialController::class, 'pendingstore'])->name('pending.store');
Route::post('/edit-pending', [DenialController::class, 'pendingedit'])->name('pending.edit');
Route::post('/delete-pending', [DenialController::class, 'pendingdestroy'])->name('pending.delete');

//provider
Route::get('/provider',[ProviderController::class,'index'])->name('provider-view');
Route::post('/add-update-provider', [ProviderController::class, 'store'])->name('provider.store');
Route::post('/edit-provider', [ProviderController::class, 'edit'])->name('provider.edit');
Route::post('/delete-provider', [ProviderController::class, 'destroy'])->name('provider.delete');

//insurance
Route::get('/insurance',[ProviderController::class,'view'])->name('insurance-view');
Route::post('/add-update-insurance', [ProviderController::class, 'insurancestore'])->name('insurance.store');
Route::post('/edit-insurance', [ProviderController::class, 'insuranceedit'])->name('insurance.edit');
Route::post('/delete-insurance', [ProviderController::class, 'insurancedestroy'])->name('insurance.delete');

//patient-detail
Route::get('/patient-detail/{id}',[PatientController::class,'detailindex'])->name('detail.index');
Route::post('/add-update-patient-detail', [PatientController::class, 'detailstore'])->name('detail.store');
Route::post('/edit-patient-detail', [PatientController::class, 'detailedit'])->name('detail.edit');
Route::post('/delete-patient-detail', [PatientController::class, 'detaildestroy'])->name('detail.delete');
Route::get('/pendinglist',[PatientController::class,'pendinglist'])->name('pendinglist');

//patient
Route::get('/patient',[PatientController::class,'index'])->name('patient.index');
Route::post('/add-update-patient', [PatientController::class, 'store'])->name('patient.store');
Route::post('/edit-patient', [PatientController::class, 'edit'])->name('patient.edit');
Route::post('/delete-patient', [PatientController::class, 'destroy'])->name('patient.delete');
Route::get('/getLastName',[PatientController::class,'getLastName'])->name('getLastName');
Route::get('/getAccount', [PatientController::class, 'getAccount'])->name('getAccount');
Route::get('/getFirstName', [PatientController::class, 'getFirstName'])->name('getFirstName');
Route::get('/getDob', [PatientController::class, 'getDob'])->name('getDob');

//e-remittance
Route::get('/remittance',[RemittanceController::class,'view'])->name('remittance.index');
Route::post('/add-update-remittance', [RemittanceController::class, 'remittancestore'])->name('remittance.store');
Route::post('/edit-remittance', [RemittanceController::class, 'remittanceedit'])->name('remittance.edit');
Route::post('/delete-remittance', [RemittanceController::class, 'remittancedestroy'])->name('remittance.delete');

//work_status
Route::get('/workstatus',[RemittanceController::class,'index'])->name('work.index');
Route::post('/add-update-workstatus', [RemittanceController::class, 'store'])->name('workstatus.store');
Route::post('/edit-workstatus', [RemittanceController::class, 'edit'])->name('workstatus.edit');
Route::post('/delete-workstatus', [RemittanceController::class, 'destroy'])->name('workstatus.delete');

//medical_records
Route::get('/medical',[MedicalController::class,'index'])->name('medical.index');
Route::post('/add-update-medical', [MedicalController::class, 'store'])->name('medical.store');
Route::post('/edit-medical', [MedicalController::class, 'edit'])->name('medical.edit');
Route::post('/delete-medical', [MedicalController::class, 'destroy'])->name('medical.delete');
});
