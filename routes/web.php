<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AkademikController;

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


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit')->middleware(['auth', 'angket.checker']);
Route::patch('password', [ChangePasswordController::class, 'update'])->name('password.edit')->middleware(['auth', 'angket.checker']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware(['auth', 'angket.checker']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'angket.checker']);
// Route::get('/dashboard', function() {
//     return view('dashboard.index');
// })->middleware(['auth', 'angket.checker']);

Route::get('/kelas', [JadwalController::class, 'index'])->middleware(['auth', 'angket.checker']);
Route::get('/khs', [AkademikController::class, 'khs'])->middleware(['auth', 'angket.checker']);
Route::get('/krs', [AkademikController::class, 'krs'])->middleware(['auth', 'cors']);
Route::post('/irsDel', [AkademikController::class, 'irsDel'])->middleware(['auth', 'angket.checker', 'cors']);
Route::post('/irsAdd', [AkademikController::class, 'irsAdd'])->middleware(['auth', 'angket.checker', 'cors']);
Route::get('/getIrs', [AkademikController::class, 'getIrs'])->middleware(['auth', 'angket.checker', 'cors']);
// Route::get('/getMatkulIrs', [AkademikController::class, 'getMatkulIrs'])->middleware(['auth', 'angket.checker', 'cors']);
Route::get('/nilaieach/{kodemk}/{kodeperkul}/{smt}/{thn}', [AkademikController::class, 'nilaieach'])->middleware(['auth', 'angket.checker'])->where('thn', '.*');;
Route::get('/transkrip', [AkademikController::class, 'transkrip'])->middleware(['auth', 'angket.checker']);
Route::get('/angket', [AkademikController::class, 'angketList'])->middleware(['auth']);
Route::get('/angket/{int_kd_perkuliahan_d}', [AkademikController::class, 'isiAngket'])->middleware(['auth']);
Route::post('/angket', [AkademikController::class, 'sendAngket'])->middleware(['auth']);

