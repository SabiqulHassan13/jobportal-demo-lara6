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

// Company Routes
Route::get('/companies/{id}/{company}', 'CompanyController@index')->name('company.index');

// User Profile Routes
Route::get('/users/profile', 'UserProfileController@index');
Route::post('/users/profile/store', 'UserProfileController@store')->name('profile.store');
Route::post('/users/profile/coverletter', 'UserProfileController@coverLetter')->name('profile.coverletter');
Route::post('/users/profile/resume', 'UserProfileController@resume')->name('profile.resume');
Route::post('/users/profile/avatar', 'UserProfileController@avatar')->name('profile.avatar');

// Employer Profile Routes
Route::view('/employer/register', 'auth.emp-register');
Route::view('/employer/profile/store', 'EmployerProfileController@store')->name('employer.store');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
