<?php

use App\Http\Controllers\ElectionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\VotersController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'process'])->name('login');
Route::middleware('auth','check_user','is_disabled')->group(function(){
    Route::get('/', [NavigationController::class, 'index'])->name('dashboard');
    Route::get('/official/dashboard', [NavigationController::class, 'offish_dash'])->name('official_dashboard');
    Route::get('/official/voting', [NavigationController::class, 'official_dashboard'])->name('official_voting');
    Route::get('/position', [NavigationController::class, 'position'])->name('position');
    Route::get('/change/password', [NavigationController::class, 'view_password'])->name('view_password');
    Route::post('/change/password', [NavigationController::class, 'change_password'])->name('view_password');
    Route::get('/election', [ElectionController::class, 'index'])->name('election');
    Route::get('/official', [NavigationController::class, 'official_overview'])->name('official_overview');
    Route::post('/official', [NavigationController::class, 'add_official']);
    Route::get('/election/dashboard', [ElectionController::class, 'election_dashboard'])->name('election-board');
    Route::get('/elections', [ElectionController::class, 'all_election'])->name('election-board');
    Route::get('/election/{id}', [ElectionController::class, 'election_details'])->name('election-election_details');
    Route::get('/disable/{id}', [ElectionController::class, 'toggleDisabled'])->name('disable');
    Route::post('/candidate/{id}', [ElectionController::class, 'add_candidate'])->name('election-add_candidate');
    Route::post('/election', [ElectionController::class, 'add_new'])->name('election');
    Route::post('/voting/panel', [VotersController::class, 'votersPage'])->name('votersPage');
    Route::post('/add/voters/{id}', [VotersController::class, 'accreditate_voters'])->name('accreditate_voters');
    Route::get('/voters/list/{id}', [NavigationController::class, 'voters_list'])->name('voters-list');
    Route::get('/votes/list', [NavigationController::class, 'votes_list'])->name('votes-list');
    Route::get('/voting/{matric_number}/{pin}', [VotersController::class, 'voting_view'])->name('voting_view-list');
    Route::post('/voting/{matric_number}/{pin}', [VotersController::class, 'voting']);
    Route::get('/logout', [NavigationController::class, 'logout'])->name('logout');
    Route::get('/official/password/{id}', [NavigationController::class , 'offical_password']);
    Route::get('/official/list/', [NavigationController::class , 'official_voter_list'])->name('official_voter_list');
    Route::post('/official/password/{id}', [NavigationController::class , 'update_official']);
});


