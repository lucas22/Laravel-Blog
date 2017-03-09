@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h1>{{ $post->title  }}</h1>
            <p class="blog-text">{{ $post->body  }}</p>
            <hr>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-2">
            <div class="well btn-h1-spacing">


                <p class="info-label">Category:</p>
                <p class="info-content">{{ $post->category->name }}</p>

                <p class="info-label">Created at:</p>
                <p class="info-content">{{ date( 'j M, Y | G:i', strtotime($post->created_at) ) }}</p>

                <p class="info-label">Last updated:</p>
                <p class="info-content">{{ date( 'j M, Y | G:i', strtotime($post->updated_at) ) }}</p>

                <p class="info-label">URL:</p>
                <a class="info-content" href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a><p></p>

                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                        <form method="POST" action=" {{ route('posts.destroy', $post->id) }} ">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block" style="margin-top: 0">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection