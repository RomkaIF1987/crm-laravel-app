<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('companies', 'CompaniesController');

Route::get('/employees/create/{company}', 'EmployeesController@create')->name('employees.create');
Route::post('/employees/store', 'EmployeesController@store')->name('employees.store');
Route::get('/employees/{employee}/edit', 'EmployeesController@edit')->name('employees.edit');
Route::patch('/employees/{employee}', 'EmployeesController@update')->name('employees.update');
Route::delete('/employees/{employee}', 'EmployeesController@destroy')->name('employees.destroy');

Route::get('/get_datatable', 'DataTableController@get_datatable')->name('datatable.get_datatable');
