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

    //Apply filters so user needs to be profile owner to perform edit and update actions
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
		//Populate view with appropriate profile
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
        //If guest - display profile
		if (Auth::guest())
		{
		return View::make('profiles.show')->withUser($user);
		}
		//If user is profile owner - display manage profile options
	    elseif($user->thisUser())
	    {
	    $visitors = Visitors::whereUser_id($owner)->distinct()->select('name')->get();
	    return View::make('profiles.show')->withUser($user)->withVisitors($visitors);
        }
        //If user is not current user - store information about visitor in database
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
		//Fetch the user's records
		$user = User::whereName($name)
		->firstOrFail();
        //Redirect to the update page
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
		//Fetch the user's records
		$user = User::whereName($name)
		->firstOrFail();
        //Catch the user's input
		$input = Input::only('location', 'preferences', 'information');
		//Commit changes to database
		$user->profile->fill($input)->save();
		//Redirect on the Home page
		return Redirect::back();


	}
}

	