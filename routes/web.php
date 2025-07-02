<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/install', function () {
    Artisan::call('migrate:fresh --seed');
    return Artisan::output();
});

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

//guest routes
Route::name('front.')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('home');
    Route::get('/livescore', [FrontController::class, 'livescore'])->name('livescore');
    Route::get('{tournament:slug}/apply', [FrontController::class, 'create'])->name('apply');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tournaments/{tournament:slug}/teams', TeamController::class);
    Route::get('tournaments/{tournament:slug}/teams/{team}/print', [TeamController::class, 'print'])->name('teams.print');
    
    // tournament links
   // Route::get('tournaments/{tournament:slug}', [TournamentController::class, 'dashboard'])->name('tournament.dashboard');
    Route::resource('tournaments', TournamentController::class);
    Route::resource('tournaments/{tournament:slug}/teams', TeamController::class);

});

require __DIR__.'/auth.php';



