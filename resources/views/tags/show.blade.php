@extends('main')

@section('title', "| $tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-4">
            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-h1-spacing">Edit</a>
                <input type="submit" class="btn btn-danger pull-right btn-h1-spacing" value="Delete">
            </form>
        </div>
    </div>

    <div class="row">
        <col-md-12>
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <th><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></th>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </col-md-12>
    </div>


@endsection