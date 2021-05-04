<?php

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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies.companies');
Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees.employees');

Route::get('/create_companies', [App\Http\Controllers\CompaniesController::class, 'create'])->name('companies.create_companies');
Route::get('/create_employees', [App\Http\Controllers\EmployeesController::class, 'create'])->name('employees.create_employees');

Route::post('/companies', [App\Http\Controllers\CompaniesController::class, 'store'])->name('companies.create_companies');
Route::post('/employees', [App\Http\Controllers\EmployeesController::class, 'store'])->name('employees.create_employees');

Route::delete('/companies/{companies}', [App\Http\Controllers\CompaniesController::class, 'destroy'])->name('companies.companies');
Route::delete('/employees/{employees}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('employees.employees');

Route::get('/edit_companies/{companies}', [App\Http\Controllers\CompaniesController::class, 'edit'])->name('companies.edit_companies');
Route::get('/edit_employees/{employees}', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('employees.edit_employees');

Route::patch('/edit_companies/{companies}', [App\Http\Controllers\CompaniesController::class, 'update'])->name('companies.edit_companies');
Route::patch('/edit_employees/{employees}', [App\Http\Controllers\EmployeesController::class, 'update'])->name('employees.edit_employees');