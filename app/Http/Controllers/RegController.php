<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Auth;
use Redirect;
use Validator;



class RegController extends Controller {


	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) return Redirect::home();
		return view('reg.create');
	}

	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), 
			[
			'name' => 'required|unique:users',
			'email' => 'required|unique:users|email',
			'password' => 'required|confirmed'
			]);

        if ($validator->fails())
        {
          return redirect('/register')
          ->withErrors($validator)
          ->withInput();
        }
        else
        {
		$user = User::create(Input::only('name', 'email', 'password', 'password_confirmation'));

		Auth::login($user);

		return Redirect::home();
	}
	}


}
