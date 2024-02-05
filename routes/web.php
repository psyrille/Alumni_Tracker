<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentications\ForgotPasswordBasic;


$controller_path = 'App\Http\Controllers';

//Admin Main Page
Route::get('/admin/dashboard', $controller_path . '\admin\AdminDashboard@index')->name('admin-dashboard')->middleware('admin');
Route::get('/admin/logout', $controller_path . '\authentications\LoginBasic@destroy')->name('admin-logout');
Route::group(['prefix' => 'admin', 'middleware' =>['auth', 'admin']], function () use ($controller_path){
  Route::get('/pending-accounts', $controller_path . '\admin\Accounts@index')->name('admin-pending-accounts');
  Route::post('/approve-account', $controller_path . '\admin\Accounts@approveAccount');
  Route::post('/disapprove-account', $controller_path . '\admin\Accounts@disapproveAccount');
});














//User Main Page
Route::get('/', $controller_path . '\user\UserDashboard@index')->name('user-dashboard')->middleware('user');
Route::get('/user/logout', $controller_path . '\authentications\LoginBasic@userDestroy')->name('user-logout')->middleware('user');
Route::get('/user/my-profile', $controller_path . '\user\Profile@index')->name('user-profile')->middleware('user');
Route::get('/user/job-opportunities', $controller_path . '\user\Job@index')->name('user-job-opportunities')->middleware('user');
Route::get('/user/alumni-events', $controller_path . '\user\AlumniEvents@index')->name('user-alumni-events')->middleware('user');
Route::get('/user/transcriptOfRecords', $controller_path.'\user\Transcript@index')->name('transcript-of-records')->middleware('user');

Route::group(['prefix' => 'user', 'middleware' =>['auth', 'user']], function () use ($controller_path){
  Route::post('/addWork', $controller_path . '\user\Profile@addWork');
  Route::post('/editProfileAbout', $controller_path . '\user\Profile@editAbout');
});











//TOR


// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/login-admin-basic', $controller_path . '\authentications\LoginBasic@adminIndex')->name('auth-login-admin-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/getInfo', $controller_path . '\authentications\RegisterBasic@getInfo');
Route::get('/auth/register-edit', $controller_path . '\authentications\RegisterBasic@registerEdit');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

Route::post('/user-login', $controller_path . '\authentications\LoginBasic@login');
Route::post('/register-alumni', $controller_path . '\authentications\RegisterBasic@registerStudent');
Route::post('/register', $controller_path . '\authentications\RegisterBasic@registerAlumni');

//admin auth
Route::post('auth/sso', $controller_path . '\authentications\LoginBasic@loginAdmin');
Route::group(['prefix' => 'auth', 'middleware' =>['auth', 'admin']], function () use ($controller_path){

});
