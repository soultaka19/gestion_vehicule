<?php
namespace App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addmarque',[MarqueController::class,'index']);

Route::get('/addvehicule',[VehiculeController::class,'index']);

Route::get('/tabmarque',[MarqueController::class,'show'])->name('tabmarque');

Route::get('/tabvehicule',[VehiculeController::class,'show'])->name('tabvehicule');

Route::post('/marque',[MarqueController::class,'store'])->name('postmarque');

Route::get('/editmarque/{id}',[MarqueController::class,'edit']);

Route::post('/updatemarque',[MarqueController::class,'update'])->name('updatemarque');


Route::get('/editvehicule/{id}',[VehiculeController::class,'edit']);

Route::post('/updatevehicule',[VehiculeController::class,'update'])->name('updatevehicule');


Route::post('/vehicule',[VehiculeController::class,'store'])->name('postvehicule');

Route::get('/deletemarque/{id}',[MarqueController::class,'destroy']);

Route::get('/deletevehicule/{id}',[VehiculeController::class,'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
