<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('/tambah_data', function () {
    return view('tambah_data');
});


Route::get('/edit_data', function () {
    return view('edit_data');
});

Route::get('/logout', function(){
    \Auth::logout();
    return redirect ('/');
});