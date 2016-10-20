<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Social Oauth
Route::get('auth/{provider}', 'SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'SocialController@handleProviderCallback');
//Mail
Route::get('mail/basic_email','MailController@basic_email');
Route::get('mail/html_email','MailController@html_email');
Route::get('mail/attachment_email','MailController@attachment_email');


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();
Route::post('login_api',['as'=>'login_api','uses'=>'MailController@login_api']);
Route::group(['prefix'=>'admin'],function(){
    Route::get('/menu','MenuController@index');
});