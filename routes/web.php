<?php

use App\Http\Controllers\Equipments\EquipmentController;
use App\Http\Controllers\TrackingEquipments\TrackingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//User management
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/user/register', [UserController::class, 'store'])->name('user.register');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// ------------------------------------------End User Management---------------------------------



//Equipment management 
Route::get('/equipments', [EquipmentController::class, 'index'])->name('equipments');
Route::post('/equipment/add', [EquipmentController::class, 'store'])->name('equipment.add');
Route::get('/equipment/edit/{id}', [EquipmentController::class, 'edit'])->name('equipment.edit');
Route::patch('/equipment/update/{id}', [EquipmentController::class, 'update'])->name('equipment.update');
Route::get('/equipment/delete/{id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
Route::get('/assign/{id}', [EquipmentController::class, 'getassignform'])->name('assign');
Route::post('/assignequipment', [EquipmentController::class, 'assign'])->name('assignequipment');
Route::get('/unassign/equipment/{id}', [EquipmentController::class, 'unassign'])->name('unassign.equipment');
// ------------------------------------------End Equipment Management---------------------------------

//Assignement management 
Route::get('/equipment/assigments', [TrackingController::class, 'index'])->name('assigments');
