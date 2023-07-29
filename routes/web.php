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

Route::get('/edit-client/{id}', function ($id){
    return view('/edit-client');
});

//Route::post('/edit-client/{id}/check', [MainController::class,'edit_client'])->name('edit-client');
