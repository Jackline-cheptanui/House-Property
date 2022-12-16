<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'welcome'])->name('detail');
Route::get('/login', function () {
    return redirect()->route('login');
});
//
//create property_types
Route::post('/create/property', [HomeController::class, 'create'])->name('property.create');
Route::post('/room/type', [HomeController::class, 'addRoomTypes'])->name('room.create');
Route::post('/rooms', [HomeController::class, 'addPropertyRoom'])->name('rooms.create');
Route::post('/searchwork', [HomeController::class, 'searchwork'])->name('rooms.searchwork');

Route::get('/addroom_types', [HomeController::class, 'addroom_types'])->name('addroom.types');
Route::get('/addrooms', [HomeController::class, 'addrooms'])->name('room.add');
Route::get('/addproperty', [HomeController::class, 'addproperty'])->name('room.addproperty');
Route::get('/getallPropertie', [HomeController::class, 'getallPropertie'])->name('propertiees.get');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('properties.edit');
Route::PUT('/update/{id}', [HomeController::class, 'updateproperty'])->name('updateproperty');
Route::delete('/delete/{user}', [HomeController::class, 'destroy'])->name('destroy.property');


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users 
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');

    
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [UserController::class, 'export'])->name('export');

});

