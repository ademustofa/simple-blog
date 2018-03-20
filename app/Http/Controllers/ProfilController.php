<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class ProfilController extends Controller{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('home')->withPosts($posts);
    }

     public function about()
    {
        return view('about');  
    }

    public function contact()
    {
		return view('contact');    
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('ademustofa286@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email has been sent');

        return redirect('/');
    }

}
    