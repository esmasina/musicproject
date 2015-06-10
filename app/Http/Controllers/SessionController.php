<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use View;
use Validator;
use Input;
use App\Models\User;
use Illuminate\Http\Request;


class SessionController extends Controller {

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('session.create');
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
			'email' => 'required|email',
			'password' => 'required'
			]);

        if ($validator->fails())
        {
          return redirect('/login')
          ->withErrors($validator)
          ->withInput();
        }
        else
        {
        	$input = Input::only('email', 'password');
        	
        	if(Auth::attempt($input))
        	{
            return Redirect::intended('/');
        	}
        return Redirect::back()->withInput()->withFlashMessage('Wrong Credentials');
	
	}}

	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();

		return Redirect('/login');
	}

}
