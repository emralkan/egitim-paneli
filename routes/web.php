<?php

use App\Http\Controllers\contact\ContactController;
use App\Http\Middleware\LocalizationMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PackageController;
use App\Http\Controllers\backend\EducationController;
use App\Http\Controllers\backend\LanguageController;
use App\Http\Controllers\backend\GamesController;
use App\Http\Controllers\backend\ModuleController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::middleware([LocalizationMiddleware::class])->group(function () {


        Route::get('/', function () {
            return redirect()->route('dashboard');
        });

        //USER İŞLEMLERİ


            Route::get('/change-language/{languageKey}', function ($languageKey) {
                Session::put('locale', $languageKey);
                return redirect()->back();
            });
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');



        Route::get('/users', [AuthController::class, 'users'])->name('users');
        Route::get('/user-create', [AuthController::class, 'create'])->name('user-create');
        Route::post('/user-create', [AuthController::class, 'created'])->name('user-created');
        Route::get('/user-update/{id}', [AuthController::class, 'update'])->name('user-update');
        Route::post('/user-update', [AuthController::class, 'updated'])->name('user-updated');
        Route::get('/user-delete/{id}', [AuthController::class, 'delete'])->name('user-delete');


        //PAKETLER
        Route::get('/package-create', [PackageController::class, 'packageCreate'])->name('package-create');
        Route::post('/package-created', [PackageController::class, 'packageCreated'])->name('package-created');
        Route::get('/package.index', [PackageController::class, 'packageIndex'])->name('package.index');
        Route::get('/package.detail/{id}', [PackageController::class, 'detail'])->name('package-detail');
        Route::post('/package-games', [PackageController::class, 'packageGames'])->name('package-games');


        //EĞİTİMLER
        Route::get('/education', [EducationController::class, 'education'])->name('education');
        Route::get('/education-create', [EducationController::class, 'educationCreate'])->name('education-create');
        Route::post('/education-created', [EducationController::class, 'educationCreated'])->name('education-created');
        Route::get('/education-update/{id}', [EducationController::class, 'educationUpdate'])->name('education-update');
        Route::post('/educate-updated', [EducationController::class, 'educationUpdated'])->name('educate-updated');
        Route::get('/education-delete/{id}', [EducationController::class, 'educationDeleted'])->name('education-delete');




        Route::post('/logins', [AuthController::class, 'logins'])->name('logins');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/registered', [AuthController::class, 'registered'])->name('registered');
        Route::get('/signout', [AuthController::class, 'signout'])->name('signout');




        Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
        Route::get('/contact-messages/{id}', [ContactController::class, 'message'])->name('contact-messages');
        Route::get('/contact-members', [ContactController::class, 'members'])->name('contact-members');
        Route::post('/contact-member', [ContactController::class, 'member'])->name('contact-member');




        //DİLLER
        Route::get('/languages', [LanguageController::class, 'languages'])->name('languages');
        Route::get('/language-create', [LanguageController::class, 'languageCreate'])->name('language-create');
        Route::post('/languages-created', [LanguageController::class, 'languageCreated'])->name('languages-created');
        Route::get('/language-update/{id}', [LanguageController::class, 'languageUpdate'])->name('language-update');
        Route::post('/language-updated', [LanguageController::class, 'languageUpdated'])->name('language-updated');
        Route::get('/language-delete/{id}', [LanguageController::class, 'languageDelete'])->name('language-delete');



        Route::get('/languagesLine', [LanguageController::class, 'languagesLine'])->name('languagesLine');
        Route::get('/languageLines-create', [LanguageController::class, 'languagesLineCreate'])->name('languageLines-create');
        Route::post('/languageLines-created', [LanguageController::class, 'languagesLineCreated'])->name('languageLines-created');
        Route::get('/languageLines-update/{id}', [LanguageController::class, 'languagesLineUpdate'])->name('languageLines-update');
        Route::post('/languageLines-updated', [LanguageController::class, 'languagesLineUpdated'])->name('languageLines-updated');
        Route::get('/languageLines-delete/{id}', [LanguageController::class, 'languagesLineDelete'])->name('languageLines-delete');



        Route::get('/games', [GamesController::class, 'games'])->name('games');
        Route::get('/game-create', [GamesController::class, 'gamesCreate'])->name('games-create');
        Route::post('/game-created', [GamesController::class, 'gamesCreated'])->name('games-created');
        Route::get('/game-update/{id}', [GamesController::class, 'gameUpdate'])->name('game-update');
        Route::post('/game-updated', [GamesController::class, 'gameUpdated'])->name('game-updated');
        Route::get('/game-delete/{id}', [GamesController::class, 'gameDelete'])->name('game-delete');



        Route::get('/module', [ModuleController::class, 'module'])->name('module');
        Route::get('/module-create', [ModuleController::class, 'moduleCreate'])->name('module-create');
        Route::post('/module-created', [ModuleController::class, 'moduleCreated'])->name('module-created');
        Route::get('/module-update/{id}', [ModuleController::class, 'moduleUpdate'])->name('module-update');
        Route::post('/module-updated', [ModuleController::class, 'moduleUpdated'])->name('module-updated');
        Route::get('/module-delete/{id}', [ModuleController::class, 'moduleDelete'])->name('module-delete');



    });
