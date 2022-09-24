<?php

use App\Http\Controllers\CVController;
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


Route::controller(UserController::class)->name('users')->group(function(){
    Route::get('/','index');
    Route::post('/user/add','createUser');
    Route::get('user/edit/{user}','getEditUser');
    Route::put('user/edit/{user}','updateUser');
    Route::delete('user/delete/{user}','deleteUser');
});

Route::controller(CVController::class)->name('cvs')->group(function(){
    Route::get('/cvs','index');
    Route::get('user/cvs/{user}','getUserCVs');
    Route::post('/cv/add','createCV');
    Route::get('cv/edit/{cv}','getEditCV');
    Route::put('cv/edit/{cv}','updateCV');
    Route::delete('cv/delete/{cv}','deleteCV');
});

Route::controller(SectionController::class)->name('sections')->group(function(){
    Route::get('/sections','index');
    Route::post('/section/add','createSection');
    Route::get('cv/sections/{cv}','getCVSections');
    Route::get('section/edit/{section}','getEditSection');
    Route::put('section/edit/{section}','updateSection');
    Route::delete('section/delete/{section}','deleteSection');
});