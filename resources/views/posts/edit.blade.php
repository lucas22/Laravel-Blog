@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')

    <link rel="stylesheet" href="/css/select2.min.css">

@endsection

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            {{ csrf_field() }}
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <input class="form-control" name="title" type="text" value="{{ $post->title  }}" placeholder="Post title">
                <textarea class="form-control lead" name="body" rows="8" placeholder="Post text">{{ $post->body  }}</textarea>

                <select class="form-control" name="category_id">
                    <option disabled>Select a category:</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($post->category->id == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                    @endforeach
                </select>

                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    <option disabled>Select some tags:</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if($post->tag != null && $post->tag->id == $tag->id) selected="selected" @endif>{{ $tag->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="no-margin-top col-lg-4 col-md-4 col-sm-6 col-xs-8 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-2">
                <div class="well btn-h1-spacing">

                    <p class="info-label">Category:</p>
                    <p class="info-content">{{ $post->category->name }}</p>

                    <p class="info-label">Created at:</p>
                    <p class="info-content">{{ date( 'j M, Y | G:i', strtotime($post->created_at) ) }}</p>

                    <p class="info-label">Last updated:</p>
                    <p class="info-content">{{ date( 'j M, Y | G:i', strtotime($post->updated_at) ) }}</p>

                    <p class="info-label">URL:</p>
                    <a class="info-content" href="{{ route('blog.single', $post->slug) }}" target="_blank">{{ route('blog.single', $post->slug) }}</a><p></p>

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

@section('scripts')

    <script src="/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.select2-multi').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
    </script>

@endsection