@extends('main')

@section('title', '| $post->title')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
            <h1 class="text-right">{{ $post->title }}</h1>
            <h5 class="text-right">Last updated {{ date('j M, Y | G:i', strtotime($post->updated_at)) }}</h5>
            <hr>
            <p class="blog-text">{{ $post->body  }}</p>
            <p style="margin-top: 3em">Category: {{ ($post->category != NULL) ? $post->category->name : "None" }}</p>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>

            <hr>
            <a href="/" class="btn btn-primary text-uppercase">< Back</a>
        </div>
    </div>

@endsection