<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Profile;
use App\Models\Visitors;
use Auth;
use Redirect;
use Input;
use View;
use DB;


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
		//Check if the user is existing
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
        //Get all required information
        $visitor = Auth::user()->name;
	    $email = Auth::user()->email;
	    $owner = $user->id;
        //What to do with user
		if (Auth::guest())
		{
		return View::make('profiles.show')->withUser($user);
		}
	    elseif($user->thisUser())
	    {
	    $visitors = Visitors::whereUser_id($owner)->distinct()->select('name')->get();
	    return View::make('profiles.show')->withUser($user)->withVisitors($visitors);
        }
        else
        {
	    $values = array('name' => $visitor, 'email' => $email, 'user_id' => $owner);
	    DB::table('visitors')->insert($values);
        return View::make('profiles.show')->withUser($user);
       //$input = array($visitor, $owner);
       //Visitors::create($input);
	   }
	

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

	