@extends('main')

@section('title', '| Blog')

@section('content')

    <div class="row">
        <div class="col md-12">
            <h1>Blog</h1>
        </div>
    </div>

    <div class="row">
    @foreach($posts as $post)
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ route('blog.single', $post->slug) }}"><h2> {{ $post->title }} </h2></a>
                <h5>Published: {{ date('j M, Y | G:i', strtotime($post->created_at)) }}</h5>
                <p class="blog-text">{{ substr($post->body, 0, 250)}}{{ strlen($post->body)>250 ? "..." : "" }}</p>
                <hr>
            </div>
    @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">{!! $posts->links() !!}</div>
        </div>
    </div>

@endsection