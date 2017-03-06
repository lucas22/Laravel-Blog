@extends('main')

@section('title', '| Create New Post')

@section('content')

    <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

        <h1>Create a new post!</h1>
        <hr>

        <form class="form-group" method="POST" action="{{ route('posts.store') }}">
            {{ csrf_field() }}
            <div class="row">
                <input class="form-control" name="title" type="text" required placeholder="Post title" value="{{ old('title') }}">
                <textarea class="form-control" name="body" required rows="8" placeholder="Post text">{{ old('body') }}</textarea>
                <div>
                    <p class="col-lg-2 col-md-3 col-sm-4 col-xs-6 text-right">site.com/blog/</p>
                    <input class="col-lg-10 col-md-9 col-sm-8 col-xs-6" name="slug" type="text" required value="{{ old('slug') }}">
                </div>
            </div>
            <div class="row">
                <input class="center btn btn-success" name="submit" type="submit" value="Publish!">
            </div>
        </form>

        <a href="/" class="text-uppercase text-danger small">Cancel</a>

    </div>

@endsection