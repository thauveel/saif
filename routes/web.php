<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teams', TeamController::class);
    Route::resource('tournaments', TournamentController::class);
});

require __DIR__.'/auth.php';


//generate links s
Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');

    echo 'ok';
});

//generate links s
Route::get('install', function (){
    
    // \Illuminate\Support\Facades\Artisan::call('migrate');

    echo 'ok';
});

Route::get('clear', function (){
    
    \Illuminate\Support\Facades\Artisan::call('view:clear');

    echo 'ok';
});

//generate links s
Route::get('dbseed', function (){
    \Illuminate\Support\Facades\Artisan::call('db:seed DatabaseSeeder');
    
    // \Illuminate\Support\Facades\Artisan::call('migrate:fresh');

    echo 'ok';
});
