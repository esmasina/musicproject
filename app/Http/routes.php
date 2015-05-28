<?php
Route::get('home', 'HomeController@index');
Route::get('about', 'HomeController@about');
Route::get('/', 'WelcomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
