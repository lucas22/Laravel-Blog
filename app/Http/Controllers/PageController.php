<?php

namespace App\Http\Controllers;
use App\Post;

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

    public function postContact() {

    }

}