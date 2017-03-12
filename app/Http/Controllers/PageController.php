<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout() {

        $firstname = "Lucas";
        $lastname = "Parzianello";
        $fullname = $firstname . " " . $lastname;
        $email = "lucasparza@gmail.com";

        $contact_data = [];
        $contact_data['email'] = $email;
        $contact_data['fullname'] = $fullname;

        return view('pages.about') -> with("contact_data", $contact_data);
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {

        $this->validate($request, [
            'name'      => 'required | max:255',
            'email'     => 'required | email',
            'subject'   => 'min:4',
            'message'   => 'min:10'
        ]);

        $data = array(
            'name'         => $request->name,
            'email'         => $request->email,
            'subject'       => $request->subject,
            'bodyMessage'   => $request->message,
            'survey'        => ['q1' => "hello", 'q2' => 'YES']
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('hello@nuka.com.br');
            $message->subject("Blog contact | ".$data['subject']);
        });

        $request->session()->flash('success', 'Message sent, we\'ll reply soon!');

        return redirect()->route('blog.index');
    }

    public function getSettings() {
        return (Auth::check()) ? view('pages.settings') : view('auth.login');
    }

}