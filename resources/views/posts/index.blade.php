@extends('main')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
            <h1>All posts</h1>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Create New Post</a>
        </div>

        <hr>
    </div>

    <div class="row">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Category</th>
                <th>Created at</th>
                <th></th>
            </thead>

            <tbody>
                @foreach( $postsDisplayed as $post )
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{substr($post->body, 0, 100)}}{{ strlen($post->body)>100 ? "..." : ""}}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{date('d/m/y | G:i', strtotime($post->created_at))}}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn-sm center btn-block btn-default">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn-sm center btn-block btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection