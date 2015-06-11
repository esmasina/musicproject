<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use App\Models\User;
class HomeController extends Controller {

	public function index()
	{
		return view('home');

	}

        public function about()
	{
		return view('about');
	}
         public function newform()
	{
             
		return view('new');
	}
        public function contact()
	{
		return view('contact');
	}
         public function store()
    {
             return('hi');
    }

    //Return page with all users
    public function allusers()
    {
    $users = User::orderBy('name', 'asc')->get();
    return View('users')->withUsers($users);   
    }

}
