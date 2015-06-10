<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Route;
use Auth;
use Redirect;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Filters
		Route::filter('currentUser', function($route)
		{
			//If guest - redirect home
				if (Auth::guest()) return Redirect::home();
				//If wrong guy - redirect home
				if (Auth::user()->name !==$route->parameter('profile'))
				{
					return Redirect::home();
				}
		});
	

	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
