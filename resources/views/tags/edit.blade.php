@extends('main')

@section('title', "| Edit Tag")

@section('content')

    <div class="row">
        <!-- TODO: not working - MethodNotAllowedHttpException. See posts/edit.blade -->
        <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="form-group">
            {{ csrf_field() }}
            <input type="text" class="form-control" placeholder="Tag Name" name="name">
            <input type="submit" class="btn btn-success" value="Save changes">
        </form>
        {{ method_field('PUT') }}
    </div>

@endsection