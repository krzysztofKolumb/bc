<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\LabTestCategoryController;
use App\Http\Controllers\LabPackageController;
use App\Http\Controllers\ClinicalTrialController;
use App\Http\Controllers\ClinicalTrialCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\FileCategoryController;

use App\Http\Controllers\ConsultationController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/zespol', [TeamController::class, 'index'])->name('team');
Route::get('/o-nas', [AboutController::class, 'index'])->name('about');
Route::get('/aktualnosci', [NewsController::class, 'index'])->name('news');
Route::get('/kontakt', [ContactController::class, 'index'])->name('contact');
Route::get('/aktualnosci/{post}', [NewsController::class, 'show'])->name('post');
Route::get('/zespol/{expert}', [TeamController::class, 'show'])->name('expert-profile');

Route::get('/oferta/specjalizacje', [SpecialtyController::class, 'index'])->name('specialties');
Route::get('/oferta/badania-kliniczne', [ClinicalTrialController::class, 'index'])->name('clinicalTrials');
Route::get('/oferta/badania-laboratoryjne', [LabTestController::class, 'index']);
Route::get('/oferta/{offer}', [OfferController::class, 'show'])->name('offer');
Route::get('/oferta/pracownia-endoskopii/{treatment}', [TreatmentController::class, 'show'])->name('endoscopy-treatment');
Route::get('/oferta/badania-kliniczne/{clinicalTrial}', [ClinicalTrialController::class, 'show'])->name('clinicalTrial');
Route::get('/oferta/specjalizacje/{specialty}', [SpecialtyController::class, 'show'])->name('specialty');

Route::get('/strefa-pacjenta/rejestracja', [RegistrationController::class, 'index']);
Route::get('/strefa-pacjenta/grafik-przyjec', [ScheduleController::class, 'index']);
Route::get('/strefa-pacjenta/polityka-prywatnosci', [PrivacyPolicyController::class, 'index']);
Route::get('/strefa-pacjenta/czesto-zadawane-pytania', [FaqController::class, 'index']);
Route::get('/strefa-pacjenta/do-pobrania', [FilesController::class, 'index']);
Route::get('/strefa-pacjenta/cennik-konsultacji', [ConsultationController::class, 'index']);
Route::get('/strefa-pacjenta/cennik-zabiegow', [TreatmentController::class, 'index']);
Route::get('/strefa-pacjenta/cennik-badan-laboratoryjnych', [LabTestController::class, 'priceList']);
Route::get('/strefa-pacjenta/pakiety-laboratoryjne', [LabPackageController::class, 'index']);
