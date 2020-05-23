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

// Route::get('/', function () {
//     return view('master');
// });

// Job Routes
Route::get('/', 'JobController@index');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/create', 'JobController@create')->name('jobs.create');
Route::post('/jobs/store', 'JobController@store')->name('jobs.store');
Route::get('/jobs/myjobs', 'JobController@myjobs')->name('jobs.myjobs');

// Company Routes
Route::get('/companies/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/companies/create', 'CompanyController@create')->name('company.create');
Route::post('/companies/store', 'CompanyController@store')->name('company.store');
Route::post('/companies/coverphoto', 'CompanyController@coverPhoto')->name('company.coverphoto');
Route::post('/companies/logo', 'CompanyController@logo')->name('company.logo');

// User Profile Routes
Route::get('/users/profile', 'UserProfileController@index')->name('profile.index');
Route::post('/users/profile/store', 'UserProfileController@store')->name('profile.store');
Route::post('/users/profile/coverletter', 'UserProfileController@coverLetter')->name('profile.coverletter');
Route::post('/users/profile/resume', 'UserProfileController@resume')->name('profile.resume');
Route::post('/users/profile/avatar', 'UserProfileController@avatar')->name('profile.avatar');

// Employer Profile Routes
Route::view('/employer/register', 'auth.emp-register')->name('employer.register');
Route::post('/employer/profile/store', 'EmployerProfileController@store')->name('employer.store');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
