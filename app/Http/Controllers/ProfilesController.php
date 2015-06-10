<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Profile;
use Redirect;
use Input;
use View;

class ProfilesController extends Controller {

	function __construct() 
	{
		$this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name)
	{
		try
		{
		 $user = User::with('profile')
		 ->wherename($name)
		 ->firstOrFail();
		}

		catch (ModelNotFoundException $e)
		{
            return Redirect::home();
		}
		
		return View::make('profiles.show')->withUser($user);
	}


    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($name)
	{
		$user = User::whereName($name)
		->firstOrFail();
		return View::make('profiles.edit')->withUser($user);

	}
	  /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update($name)
	{
		$user = User::whereName($name)
		->firstOrFail();
		$input = Input::only('location', 'preferences', 'information');
		$user->profile->fill($input)->save();
		return Redirect::back();


	}
}

	