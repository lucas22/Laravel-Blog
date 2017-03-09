@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

    <link rel="stylesheet" href="/css/select2.min.css">

@endsection

@section('content')

    <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

        <h1>Create a new post!</h1>
        <hr>

        <form class="form-group" method="POST" action="{{ route('posts.store') }}">
            {{ csrf_field() }}
            <div class="row">
                <input class="form-control" name="title" type="text" required placeholder="Post title" value="{{ old('title') }}">
                <textarea class="form-control" name="body" required rows="8" placeholder="Post text">{{ old('body') }}</textarea>

                <select class="form-control" name="category_id" title="Category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    <option disabled>Select some tags:</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                <div>
                    <p class="col-lg-2 col-md-3 col-sm-4 col-xs-6 text-right">example.com/blog/</p>
                    <input class="col-lg-10 col-md-9 col-sm-8 col-xs-6" title="identifier" name="slug" type="text" required value="{{ old('slug') }}">
                </div>
            </div>
            <div class="row">
                <input class="center btn btn-success" name="submit" type="submit" value="Publish!">
            </div>
        </form>

        <a href="/" class="text-uppercase text-danger small">Cancel</a>

    </div>

@endsection

@section('scripts')

    <script src="/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection