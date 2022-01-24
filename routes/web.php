<?php

use App\Http\Controllers\MarsRoverController;
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

Route::get('/', [MarsRoverController::class, 'startingPoint'])->name('home');
Route::get('/set-up-rover', [MarsRoverController::class,'recoverSetUpRobot'])->name('recoverSetUpRover');
Route::post('/set-up-rover', [MarsRoverController::class,'setUpRobot'])->name('setUpRover');

Route::post('/commands',[MarsRoverController::class, 'giveCommandsToRover'])->name('commands');