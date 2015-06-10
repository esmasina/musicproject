<?php
<<<<<<< HEAD

#Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

#Registration
Route::get('/register', 'RegController@create');
Route::post('/register', ['as' => 'reg.store', 'uses' => 'RegController@store']);

#Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::resource('session', "SessionController", ['only' => ['create', 'store', 'destroy']]);

#User Profile
Route::resource('profile', 'ProfilesController', ['only' => ['show', 'edit', 'update']]);
Route::get('/{profile}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);




=======
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
>>>>>>> origin/master
