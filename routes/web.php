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

Route::get('/', 'MainController@p1PersonalInfo');  // p1_Personal_Info - page 1 ; Personal Info
Route::post('/', 'MainController@get1PersonalInfo');  // get_1_Personal_Info - get info ; from page 1 ;  Personal Info
Route::get('/your-home', 'MainController@p2YourHome');
Route::post('/your-home', 'MainController@get2YourHome');
Route::post('/uploadImg', 'MainController@uploadImg');
Route::get('/materials', 'MainController@p3Materials');
Route::post('/deleteImg', 'MainController@deleteImg');
Route::post('/materials', 'MainController@get3Materials');
Route::get('/extras', 'MainController@p4Extras');
Route::post('/extras', 'MainController@get4Extras');
Route::get('/mail/send', 'MailController@send');
Route::post('/mail/send', 'MailController@send');
Route::post('/pay', 'PayController@pay');
