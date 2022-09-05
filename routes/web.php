<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\UserController;



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
    return view('welcome');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('report',ReportController::class)->names('report');
Route::get('/cv/cvPDF/{id}', [App\Http\Controllers\CvController::class, 'cvPDF'])->name('cvPDF');
Route::get('/transfer/transferPDF/{id}', [App\Http\Controllers\TransferController::class, 'transferPDF'])->name('transferPDF');
Route::get('/transfer/create/{id}', [App\Http\Controllers\TransferController::class, 'create'])->name('create.transfer');
Route::get('/transfer', [TransferController::class, 'index']);
Route::get('/race/index/{id}', [App\Http\Controllers\RaceController::class, 'index'])->name('indexRace');
Route::resource('race',RaceController::class)->names('race');
Route::get('/player/playerPDF/{id}', [App\Http\Controllers\PlayerController::class, 'playerPDF'])->name('playerPDF');
Route::get('/player/create', [App\Http\Controllers\PlayerController::class, 'create'])->name('player.create');
Route::get('/player', [PlayerController::class, 'index']);

Route::get('/coach/coachPDF/{id}', [App\Http\Controllers\EntrenadorController::class, 'coachPDF'])->name('coachPDF');
Route::resource('coach',EntrenadorController::class)->names('coach');
Route::resource('record',RecordController::class)->names('record');
Route::get('/record/index/{id}', [App\Http\Controllers\RecordController::class, 'index'])->name('indexRec');
Route::get('/team', [TeamController::class, 'index']);
Route::resource('team',TeamController::class)->names('team');
Route::resource('player',PlayerController::class)->names('player');
Route::get('/race/{id}/edit', [App\Http\Controllers\RaceController::class, 'edit'])->name('race.editar');
Route::resource('transfer',TransferController::class)->names('transfer');

Route::get('/game/index/{id}', [App\Http\Controllers\GameController::class, 'index'])->name('indexGame');
Route::resource('game',GameController::class)->names('game');
Route::get('/cv', [CvController::class, 'index']);
Route::resource('cv',CvController::class)->names('cv');
Route::get('/cv/create/{id}', [App\Http\Controllers\CvController::class, 'create'])->name('create.cv');




Route::group(['middleware' => ['auth', 'Super Administrador']], function () {
    Route::resource('users',UserController::class)->names('users');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
});


Route::get('/team/create', [App\Http\Controllers\TeamController::class, 'create'])->name('team.create');
    Route::get('/team/{id}/edit', [App\Http\Controllers\TeamController::class, 'edit'])->name('team.editar');
    Route::get('/player/{id}/approveTransfer', [App\Http\Controllers\PlayerController::class, 'approveTransfer'])->name('player.approveTransfer');
    Route::get('/card_player/{id}/edit', [App\Http\Controllers\PlayerController::class, 'card'])->name('player.card');
    Route::get('/player/{id}/edit', [App\Http\Controllers\PlayerController::class, 'edit'])->name('player.editar');
    Route::get('/player/{id}/enable', [App\Http\Controllers\PlayerController::class, 'enable'])->name('player.enable');
    Route::get('/coach/create', [App\Http\Controllers\EntrenadorController::class, 'create'])->name('coach.create');
    Route::get('/coach/{id}/edit', [App\Http\Controllers\EntrenadorController::class, 'edit'])->name('coach.editar');
    Route::get('/record/{id}/edit', [App\Http\Controllers\RecordController::class, 'edit'])->name('record.editar');
/*Route::group(['middleware' => ['auth', 'Administrador','Super Administrador']], function () {
    
});*/


