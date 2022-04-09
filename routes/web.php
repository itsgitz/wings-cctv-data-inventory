<?php

use App\Http\Controllers\Cctvs;
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

Route::get('/', [Cctvs::class, 'index'])->name('cctv.dashboard.get');
Route::get('/search', [Cctvs::class, 'searchOnlyPage'])->name('cctv.search.get');
Route::post('/search', [Cctvs::class, 'searchShowData'])->name('cctv.search.post');

Route::resource('cctvs', Cctvs::class)->only([
    'create',
    'store',
    'show',
    'edit',
    'update',
    'destroy'
]);
