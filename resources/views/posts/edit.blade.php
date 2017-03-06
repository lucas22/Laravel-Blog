@extends('main')

@section('title', '| Edit Post')

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            {{ csrf_field() }}
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <input class="form-control" name="title" type="text" value="{{ $post->title  }}" placeholder="Post title">
                <textarea class="form-control lead" name="body" rows="8" placeholder="Post text">{{ $post->body  }}</textarea>
            </div>

            <div class="no-margin-top col-lg-4 col-md-4 col-sm-6 col-xs-8 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-2">
                <div class="well btn-h1-spacing">

                    <p class="info-label">URL:</p>
                    <a class="info-content" href="{{ route('blog.single', $post->slug) }}" target="_blank">{{ route('blog.single', $post->slug) }}</a><p></p>

                    <p class="info-label">Created at:</p>
                    <p class="info-content">{{ date( 'j M, Y | G:i', strtotime($post->created_at) ) }}</p>

                    <p class="info-label">Last updated:</p>
                    <p class="info-content">{{ date( 'j M, Y | G:i', strtotime($post->updated_at) ) }}</p>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <input class="btn btn-success btn-block" type="submit" value="Save">
                        </div>
                    </div>

                </div>
            </div>
            {{ method_field('PUT') }}
        </form>

    </div>

@endsection