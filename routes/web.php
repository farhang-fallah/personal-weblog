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
Route::get('/article/{articleSlug}', 'ArticleController@single');
Route::get('/search' , 'HomeController@search');
Route::post('/article/{article}/comment' , 'HomeController@comment')->name('comment.store');


Route::group(['namespace' => 'Admin' , 'middleware' => ['auth:web' , 'CheckAdmin'],'prefix' => 'admin'], function(){
    $this->get('/panel' , 'PanelController@index');
    $this->post('/panel/upload-image' , 'PanelController@uploadImageSubject');
    $this->resource('/panel/article' , 'ArticleController');
    $this->get('/comments/unsuccessful' , 'CommentController@unsuccessful');
    $this->resource('/comments' , 'CommentController');
    $this->resource('/profile' , 'ProfileController');
    $this->get('/change/password' , 'ChangePasswordController@index');
    $this->post('/change/password/new', 'ChangePasswordController@update');
});

Route::group(['namespace' => 'Auth'] , function (){
    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');
});