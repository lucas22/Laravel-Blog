@extends('main')

<?php $titleEscaped = htmlspecialchars($post->title); ?>
@section('title', "| $titleEscaped")

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
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
            @if($post->comments->count() > 0)
                <p class="center">Comments</p>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="row">
                            <strong class="col-lg-6 col-md-6 col-sm-6 col-xs-6">{{ $comment->name }}</strong>
                            <small style="font-family: sans-serif; text-align: right" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 push-right">{{ date('h:m | d/m/y',strtotime($comment->created_at)) }}</small>
                        </div>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            @else
                <p class="center">Be the first to comment below!</p>
            @endif
        </div>
    </div>

    <hr>
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0" id="comment-form">
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="form-group">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                    </div>
                </div>
                <textarea class="form-control" name="comment" placeholder="Comment" rows="5" required></textarea>
                <input type="submit" class="btn btn-success center" name="submit" value="Add comment">
            </form>
        </div>
    </div>

@endsection