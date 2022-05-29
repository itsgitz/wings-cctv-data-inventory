<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CctvsController;
use App\Http\Controllers\HelloController;
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

Route::get('/', [CctvsController::class, 'index'])->name('cctv.dashboard.get');
Route::get('/search', [CctvsController::class, 'searchOnlyPage'])->name('cctv.search.get');
Route::post('/search', [CctvsController::class, 'searchShowData'])->name('cctv.search.post');

Route::resource('cctvs', CctvsController::class)->only([
    'create',
    'store',
    'show',
    'edit',
    'update',
    'destroy'
]);

Route::get('/login', [AuthenticationController::class, 'login'])
    ->name('auth.login.get')
    ->middleware('guest');

Route::post('/login', [AuthenticationController::class, 'authenticate'])
    ->name('auth.login.post')
    ->middleware('guest');

Route::get('/logout', [AuthenticationController::class, 'logout'])
    ->name('auth.logout.get')
    ->middleware('auth');


/*
 * Testing routes:
 */
Route::get('/testing', [HelloController::class, 'index']);
