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
use App\Http\Controllers\LabPackageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AdminController;

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
Route::get('/oferta/specjalizacje/{specialty}', [SpecialtyController::class, 'show'])->name('specialty');
Route::get('/oferta/{offer}', [OfferController::class, 'show'])->name('offer');
Route::get('/oferta/pracownia-endoskopii/{treatment}', [TreatmentController::class, 'show'])->name('endoscopy-treatment');

Route::get('/strefa-pacjenta/rejestracja', [RegistrationController::class, 'index']);
Route::get('/strefa-pacjenta/grafik-przyjec', [ScheduleController::class, 'index']);
Route::get('/strefa-pacjenta/polityka-prywatnosci', [PrivacyPolicyController::class, 'index']);
Route::get('/strefa-pacjenta/czesto-zadawane-pytania', [FaqController::class, 'index']);
Route::get('/strefa-pacjenta/do-pobrania', [FilesController::class, 'index']);
Route::get('/strefa-pacjenta/cennik-konsultacji', [ConsultationController::class, 'index']);
Route::get('/strefa-pacjenta/cennik-zabiegow', [TreatmentController::class, 'index']);
Route::get('/strefa-pacjenta/cennik-badan-laboratoryjnych', [LabTestController::class, 'priceList']);
Route::get('/strefa-pacjenta/pakiety-laboratoryjne', [LabPackageController::class, 'index']);


Route::post('/auth/save',[AdminController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[AdminController::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[AdminController::class, 'logout'])->name('auth.logout');

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('cities', 'Admin\CityController');
});

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[AdminController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[AdminController::class, 'register'])->name('auth.register');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::prefix('admin/zespol')->group(function () {
        Route::get('/specjalisci', [AdminController::class, 'experts'])->name('admin-experts');
        Route::get('/specjalisci/{expert}', [AdminController::class, 'expertShow'])->name('admin-expert-profile');
        Route::get('/personel', [AdminController::class, 'employees'])->name('admin-employees');
        Route::get('/rekomendacje', [AdminController::class, 'recommendations'])->name('admin-recommendations');
    });

    // Route::get('/admin/specjalisci', [AdminController::class, 'experts'])->name('admin-experts');
    // Route::get('/admin/specjalisci/{expert}', [AdminController::class, 'expertShow'])->name('admin-expert-profile');
    // Route::get('/admin/personel', [AdminController::class, 'employees'])->name('admin-employees');

    Route::get('/admin/konsultacje', [AdminController::class, 'consultations'])->name('admin-consultations');
    Route::get('/admin/specjalizacje', [adminController::class, 'specialties'])->name('admin-specialties');
    Route::get('/admin/stopnie', [AdminController::class, 'degrees'])->name('admin-degrees');
    Route::get('/admin/zawody', [AdminController::class, 'professions'])->name('admin-professions');
    Route::get('/admin/badania-kliniczne', [AdminController::class, 'trials'])->name('admin-clinical-trials');
    Route::get('/admin/badania-kliniczne-kategorie', [AdminController::class, 'trialsCategories'])->name('admin-clinical-trials-categories');
    Route::get('/admin/badania-laboratoryjne', [AdminController::class, 'labTests'])->name('admin-lab-tests');
    Route::get('/admin/badania-laboratoryjne-kategorie', [AdminController::class, 'labTestsCategories'])->name('admin-lab-test-categories');
    Route::get('/admin/pakiety-laboratoryjne', [AdminController::class, 'packages'])->name('admin-lab-packages');
    Route::get('/admin/zabiegi', [AdminController::class, 'treatments'])->name('admin-treatments');
    Route::get('/admin/zabiegi-kategorie', [AdminController::class, 'clinics'])->name('admin-clinics');
    Route::get('/admin/dokumenty', [AdminController::class, 'files'])->name('admin-files');
    Route::get('/admin/dokumenty-kategorie', [AdminController::class, 'filesCategories'])->name('admin-file-categories');
    Route::get('/admin/aktualnosci', [AdminController::class, 'posts'])->name('admin-news');
    Route::get('/admin/faq/', [AdminController::class, 'faq'])->name('admin-faq');
    Route::get('/admin/obrazy', [AdminController::class, 'pictures'])->name('admin-pictures');
    Route::get('/admin/kontakt', [AdminController::class, 'contact'])->name('admin-contact');
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin-page-home');
    Route::get('/admin/o-nas', [AdminController::class, 'about'])->name('admin-page-about');
    Route::get('/admin/teksty', [AdminController::class, 'pages'])->name('admin-text');
    Route::get('/admin/strony/{page}', [AdminController::class, 'page'])->name('admin-page');

    Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
    Route::get('/admin/settings',[AdminController::class,'settings']);
    Route::get('/admin/profile',[AdminController::class,'profile']);
    Route::get('/admin/staff',[AdminController::class,'staff']);
});


