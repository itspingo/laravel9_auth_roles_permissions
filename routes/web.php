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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

// Route::group(['middleware'=>'role:author'], function(){
//     //Route::get('/home', [HomeController::class, 'home'])->name('home');
//     Route::get('/role', function () {
//         //return view('welcome');
//         dd('hi Author');
//     });
// });


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
