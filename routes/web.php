<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;

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

// redirect to /jobs
Route::get('/', function () {
    return redirect()->route('jobs.index');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::get('/companies/create', 'create')->name('companies.create');
    Route::post('/companies', 'store')->name('companies.store');
    Route::get('/companies/{company}', 'show')->name('companies.show');
});

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/create', 'create')->name('jobs.create');
    Route::post('/jobs', 'store')->name('jobs.store');
    Route::get('/jobs/{job}', 'show')->name('jobs.show');
    Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit');
    Route::put('/jobs/{job}', 'update')->name('jobs.update');
    Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy');
});
