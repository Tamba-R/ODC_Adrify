<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ValidationController;

use App\Http\Controllers\Admin\AdminAddressController;
use App\Http\Controllers\Admin\AdminValidationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ShareController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Validator\ValidatorController;
use App\Http\Controllers\User\UserController;
use App\Http\controllers\Admin\AdminUserController;



/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil publique
Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/about', function() {
    return view('public.about');
})->name('about');

Route::get('/contact', function() {
    return view('public.contact');
})->name('contact');

// Auth routes (Breeze / Jetstream)
require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Dashboard redirection after login
|--------------------------------------------------------------------------
|
| Ceci remplace le HOME constant. Déplacer la redirection selon rôle
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function(Request $request){
        $user = Auth::user();
        if($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif($user->role === 'validator') {
            return redirect()->route('validator.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    })->name('dashboard');
});
// Fin redirection dashboard


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Utilisateurs
    Route::resource('users', AdminUserController::class);

    // Adresses
    Route::resource('addresses', AdminAddressController::class);

    // Validations
    Route::get('validations', [AdminValidationController::class, 'index'])->name('validations.index');

    // Signalements
    Route::resource('reports', ReportController::class)->only(['index', 'show', 'destroy']);

    // Partages
    Route::resource('shares', ShareController::class)->only(['index', 'show']);

    // Paramètres
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
});


/*
|--------------------------------------------------------------------------
| Validateur Routes
|--------------------------------------------------------------------------
*/
Route::prefix('validator')->name('validator.')->middleware(['auth','role:validator'])->group(function(){
    Route::get('dashboard', [ValidatorController::class,'dashboard'])->name('dashboard');
    Route::get('validations/pending', [ValidatorController::class,'pendingAddresses'])->name('pending');
    Route::post('validations/{address}/action', [ValidatorController::class,'validateAddress'])->name('action');
    Route::get('validations/history', [ValidatorController::class,'history'])->name('history');
});



/*
|--------------------------------------------------------------------------
| Utilisateur Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->middleware(['auth','role:user'])->group(function () {
    // Dashboard
    Route::get('dashboard', [UserController::class,'dashboard'])->name('dashboard');

    // Gestion des adresses
    Route::get('addresses', [UserController::class,'addresses'])->name('addresses');
    Route::get('addresses/create', [UserController::class,'createAddress'])->name('addresses.create');
    Route::post('addresses', [UserController::class,'storeAddress'])->name('addresses.store');
    Route::get('addresses/{address}/edit', [UserController::class,'editAddress'])->name('addresses.edit');
    Route::put('addresses/{address}', [UserController::class,'updateAddress'])->name('addresses.update');
    Route::delete('addresses/{address}', [UserController::class,'destroyAddress'])->name('addresses.destroy');

    // Partage des adresses
    Route::get('addresses/{address}/share', [UserController::class,'shareAddress'])->name('addresses.share');
    Route::get('shares', [UserController::class, 'allShares'])->name('shares');

    // Signalements
    Route::get('reports', [UserController::class,'reports'])->name('reports');

    // Profil utilisateur
    Route::get('profile', [UserController::class,'profile'])->name('profile');
    Route::put('profile', [UserController::class,'updateProfile'])->name('profile.update');
});
// Fin routes utilisateur