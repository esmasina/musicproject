<?php
Route::get('home', 'HomeController@index');
Route::get('contact', 'HomeController@contact');
Route::get('new', 'HomeController@newform');

Route::post('contact', 'HomeController@store');
//Route::get('about', 'HomeController@about');
Route::get('/', 'WelcomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
