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

Route::get('/', 'HomeController@index');

Route::resource('/companies', 'CompanyController');

Route::resource('/companies/{company}/employees', 'EmployeeController');

Route::post('/companies/{company}/employees/search', 'CompanyController@search');

Route::get('/companies/{id}/confirmDelete', 'CompanyController@confirmDelete');

Route::get('/companies/{company}/employees/create', 'EmployeeController@create');

Route::get('/companies/employees/{role}', 'EmployeeController@getSkill');

Route::post('/companies/{company}/employees', 'EmployeeController@store');

Route::get('/companies/{company}/employees/{id}/confirmDelete', 'EmployeeController@confirmDelete');

Auth::routes(['register' => true, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{locale}', 'LocalizationController@index');