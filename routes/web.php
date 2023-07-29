<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class,'get_clients']);

Route::get('/home', [MainController::class,'get_clients'])->name('get-clients');

Route::get('/add-client', function (){
   return view('/add-client');
});

Route::post('/add-client/check', [MainController::class,'add_client'])->name('add-client');

Route::get('/edit-client/{id}', [MainController::class,'edit_client'])->name('edit-client');

Route::post('/edit-client/{id}/check', [MainController::class,'edit_client_check'])->name('edit-client-check');

Route::post('/edit-car/{id}/check', [MainController::class,'edit_car_check'])->name('edit-car-check');

Route::post('/add-car/{id}/check', [MainController::class,'add_car_check'])->name('add-car-check');

Route::get('/delete-client/{id}/check', [MainController::class,'delete_client_check'])->name('delete-client-check');

Route::get('/delete-car/{id}/check', [MainController::class,'delete_car_check'])->name('delete-car-check');


