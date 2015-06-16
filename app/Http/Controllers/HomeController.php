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
            
        public function storeConnect(Request $request)
	{
            $this->validate($request,
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'message' => 'required',
                  ]           
                );
            $data=$request->all();
             Mail::send('emails.contactResponse', $data, function($message) use ($data)
                {
//email 'From' field: Get users email add and name
                    $message->from($data['email'] , $data['name']);
//email 'To' field: cahnge this to emails that you want to be notified.                    
$message->to('skaujla109@gmail.com', 'my name')->subject('contact request');
 
                });
 
               // return View::make('contact');  
//            Mail::send('emails.contactResponse',
//        array(
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'user_message' => $request->get('message')
//        ), function($message)
//    {
//        $message->from('skaujla109@yahoo.com');
//        $message->to('skaujla109@yahoo.com', 'Admin')->subject('TODOParrot Feedback');
//    });
//     
                return Redirect('contact')
                  ->with('message', 'Thanks for contacting us!');

	}
         public function store()
    {
             return('hi');
    }

        public function subscribe()
            {
                return view('subscribe');
            }

         public function createconnect(Request $request)
	   {
                $this->validate($request,
                    [
                       'name' => 'required',
                        'email' => 'required|email',
                      ] );

              //  return ('hi');
                     return Redirect('/')
                      ->with('message', 'Thanks for subscribing! A confirmation is sent to you on the provided email.');
	    }
            
    //Return page with all users
    public function allusers()
    {
    $users = User::orderBy('name', 'asc')->get();
    return View('users')->withUsers($users);   
    }
    

}
