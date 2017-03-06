<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $postsDisplayed = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('postsDisplayed', $postsDisplayed);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, array(
                'title' => 'required | max:100',
                'slug'  => 'required | alpha_dash | min:5 | max:100 | unique:posts,slug',
                'body'  => 'required'
            ));

        // store into database
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;

        $post->save();

        $request->session()->flash('success', 'The blog post was successfully saved!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate data
        $this->validate($request, array(
            'title' => 'required | max:255',
            'body' => 'required'
        ));

        // store into database
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        $request->session()->flash('success', 'The blog post was successfully edited!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        $post->delete();

        $request->session()->flash('success','The post was deleted');
        return redirect()->route('posts.index');
    }
}
