<?php

use App\Http\Controllers\job\AboutController;
use App\Http\Controllers\job\ContactController;
use App\Http\Controllers\job\IndexController;
use App\Http\Controllers\job\JobController;
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

Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(IndexController::class)
     ->group(function(){

        Route::get('/','index')->name('Index');

     });


Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(AboutController::class)
     ->group(function(){

        Route::get('/about','about')->name('About');

     });

Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(JobController::class)
     ->group(function(){

        Route::get('/job','job')->name('Job');

     });
Route::prefix('JobPortal')
     ->as('JobPortal.')
     ->controller(ContactController::class)
     ->group(function(){

        Route::get('/contact','contact')->name('Contact');

     });








