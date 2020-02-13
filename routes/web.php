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

Route::get('/', function () {return view('welcome');});
Route::get('lang/{locale}', 'HomeController@lang');



Auth::routes(['register' => false]);


Route::get('/home', 'CompanyController@index')->name('home');
Route::put('/update_company/{company}', 'CompanyController@edit');
Route::delete('/delete_company/{company}', 'CompanyController@destroy');
Route::POST('/store_company', 'CompanyController@store');
Route::get('/employees/{company}', 'CompanyController@employees');
Route::get('new_company', 'CompanyController@create');
Route::get('open_update/{company}', 'CompanyController@show');
