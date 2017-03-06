@extends('main')
@section('title', '| Home')

@section('content')

    <div class="row">
        <div>
            <h1>Welcome to Da Blog</h1>
            <p class="lead">Thank you so much you bastard! I am really glad you're here.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('posts.create') }}" role="button">Create a post</a></p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" id="posts-container">

            @foreach($posts as $post)

                <div class="blog-post">
                    <a href="{{ route('blog.single', $post->slug) }}"><h3>{{ $post->title }}</h3></a>
                    <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                    <hr>
                </div>

            @endforeach

        </div>

        <div class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
            <h2>Sidebar</h2>
        </div>

    </div>

    <div class="row text-center">
        {!! $posts->links() !!}
    </div>

@endsection