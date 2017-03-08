<?php

namespace App\Http\Controllers;

use App\Category;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories',$categories);
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
                'title'         => 'required | max:100',
                'slug'          => 'required | alpha_dash | min:5 | max:100 | unique:posts,slug',
                'category_id'   => 'required | integer',
                'body'          => 'required'
            ));

        // store into database
        $post = new Post;
        $post->title        = $request->title;
        $post->body         = $request->body;
        $post->category_id  = $request->category_id;
        $post->slug         = $request->slug;

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
        $categories = Category::all();
        return view('posts.edit')->with('post', $post)->with('categories', $categories);
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
            'category_id'   => 'required | integer',
            'title'         => 'required | max:255',
            'body'          => 'required'
        ));

        // store into database
        $post = Post::find($id);
        $post->title        = $request->title;
        $post->body         = $request->body;
        $post->category_id  = $request->category_id;

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
